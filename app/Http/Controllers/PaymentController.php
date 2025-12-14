<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    private function initMidtrans(): void
    {
        Config::$isProduction = config('midtrans.is_production');
        Config::$serverKey    = config('midtrans.server_key');
        Config::$clientKey    = config('midtrans.client_key');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }


    public function checkout(Course $course)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return redirect()
                ->route('courses.show', $course)
                ->with('status', 'You are already enrolled in this course.');
        }

        $orderId = 'MEL-' . time() . '-' . $user->id . '-' . $course->id;

        $payment = Payment::create([
            'user_id'   => $user->id,
            'course_id' => $course->id,
            'order_id'  => $orderId,
            'amount'    => $course->price,
            'status'    => 'pending',
        ]);

        $this->initMidtrans();

        $amountInt = (int) round($course->price);

        $params = [
            'transaction_details' => [
                'order_id'     => $payment->order_id,
                'gross_amount' => $amountInt,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
            ],
            'item_details' => [
                [
                    'id'       => $course->id,
                    'price'    => $amountInt,
                    'quantity' => 1,
                    'name'     => substr($course->title, 0, 50),
                ],
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payments.checkout', [
            'course'    => $course,
            'payment'   => $payment,
            'snapToken' => $snapToken,
            'clientKey' => config('midtrans.client_key'),
        ]);
    }


    public function complete(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|string',
            'result'   => 'required|array',
        ]);

        $payment = Payment::where('order_id', $data['order_id'])->firstOrFail();

        $payment->status           = 'paid';
        $payment->payment_type     = $data['result']['payment_type'] ?? null;
        $payment->transaction_time = $data['result']['transaction_time'] ?? now()->toDateTimeString();
        $payment->raw_response     = $data['result'];
        $payment->save();

        $user   = $payment->user;
        $course = $payment->course;

        if ($user && $course) {
            $user->courses()->syncWithoutDetaching([$course->id]);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
