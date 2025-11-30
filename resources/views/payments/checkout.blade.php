@extends('layouts.main')

@section('title', 'Checkout - ' . $course->title)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <h1 class="h3 mb-3">Checkout</h1>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-1">{{ $course->title }}</h5>
                    <p class="card-text text-muted mb-2">
                        {{ $course->category }} • {{ $course->level }}
                    </p>
                    <p class="card-text fw-bold mb-0">
                        Total: ${{ number_format($course->price, 2) }}
                    </p>
                </div>
            </div>

            <div class="alert alert-info">
                You will be redirected to Midtrans Snap payment popup to complete your payment.
            </div>

            <button id="pay-button" class="btn btn-primary w-100 mb-3">
                Pay with Midtrans
            </button>

            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary w-100">
                Cancel
            </a>
        </div>
    </div>
</div>

{{-- Snap JS (Sandbox) --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientKey }}"></script>

<script>
    const payButton = document.getElementById('pay-button');

    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                // kirim ke backend untuk nyimpan payment & enroll
                fetch("{{ route('payments.complete') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        order_id: "{{ $payment->order_id }}",
                        result: result,
                    }),
                })
                .then(response => response.json())
                .then(function (data) {
                    if (data.success) {
                        window.location.href = "{{ route('profile.my-courses') }}";
                    } else {
                        alert("Payment saved but enrollment failed. Please contact support.");
                    }
                })
                .catch(function () {
                    alert("Payment success, but there was an error on our side. Please contact support.");
                });
            },
            onPending: function (result) {
                alert("Your payment is pending.");
                console.log(result);
            },
            onError: function (result) {
                alert("Payment failed.");
                console.log(result);
            },
            onClose: function () {
                console.log('Customer closed the popup without finishing the payment');
            }
        });
    });
</script>
@endsection
