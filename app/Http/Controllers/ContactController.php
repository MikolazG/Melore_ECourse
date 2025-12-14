<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Send email to admin
        try {
            Mail::to('support@melore.com')->send(new ContactFormMail($validated));
        } catch (\Exception $e) {
            Log::error('Failed to send contact form email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
