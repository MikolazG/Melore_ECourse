@extends('layouts.main')

@section('title', 'Checkout - ' . $course->title)

@section('content')
<style>
  .checkout-wrap{max-width:980px;margin:0 auto;}
  .checkout-hero{
    border:1px solid rgba(2,6,23,.08);
    border-radius:18px;
    background: linear-gradient(180deg, rgba(2,6,23,.03), rgba(2,6,23,.00));
    padding:22px 22px;
  }
  .checkout-card{
    border:1px solid rgba(2,6,23,.10);
    border-radius:18px;
    box-shadow: 0 10px 30px rgba(2,6,23,.06);
  }
  .pill{
    display:inline-flex; align-items:center; gap:.45rem;
    padding:.35rem .7rem; border-radius:999px;
    border:1px solid rgba(2,6,23,.10);
    background:#fff;
    font-size:.82rem; color:rgba(2,6,23,.68);
  }
  .muted{color:rgba(2,6,23,.62)!important;}
  .course-title{letter-spacing:-.02em;}
  .price-box{
    border:1px solid rgba(2,6,23,.10);
    border-radius:14px;
    padding:14px 14px;
    background:#fff;
  }
  .divider{height:1px;background:rgba(2,6,23,.08);margin:12px 0;}
  .btn-pay{
    border-radius:999px;
    padding:.9rem 1rem;
    font-weight:700;
    letter-spacing:.02em;
    box-shadow: 0 12px 24px rgba(13,110,253,.18);
  }
  .btn-soft{
    border-radius:999px;
    padding:.85rem 1rem;
    font-weight:600;
  }
  .secure-row{
    display:flex; gap:10px; flex-wrap:wrap;
    margin-top:10px;
  }
  .icon-dot{
    width:10px; height:10px; border-radius:999px;
    background: rgba(25,135,84,.9);
    box-shadow: 0 0 0 4px rgba(25,135,84,.12);
  }
  .pay-note{
    border:1px solid rgba(13,110,253,.18);
    background: rgba(13,110,253,.06);
    border-radius:14px;
    padding:12px 14px;
  }
  .loading{
    opacity:.75;
    pointer-events:none;
    filter:saturate(.85);
  }
</style>

@php
  $formattedPrice = 'Rp' . number_format($course->price, 0, ',', '.');
@endphp

<div class="container py-5">
  <div class="checkout-wrap">

    <div class="checkout-hero mb-4">
      <div class="d-flex align-items-start justify-content-between gap-3 flex-wrap">
        <div>
          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="pill">
              <span class="icon-dot"></span> Secure checkout
            </span>
            <span class="pill">
              Midtrans Snap
            </span>
          </div>
          <h1 class="h3 mb-1 course-title">Checkout</h1>
          <p class="muted mb-0">
            Review your course and complete payment via Midtrans popup.
          </p>
        </div>

        <div class="text-end">
          <div class="muted small mb-1">Total</div>
          <div class="h4 mb-0 fw-bold">{{ $formattedPrice }}</div>
        </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-lg-7">
        <div class="card checkout-card">
          <div class="card-body p-4">

            <div class="d-flex align-items-start justify-content-between gap-3">
              <div>
                <div class="muted small mb-1">Course</div>
                <h5 class="mb-1 fw-bold">{{ $course->title }}</h5>
                <div class="d-flex gap-2 flex-wrap">
                  <span class="pill">{{ $course->category }}</span>
                  <span class="pill">{{ $course->level }}</span>
                </div>
              </div>
              <div class="text-end">
                <div class="muted small mb-1">Price</div>
                <div class="fw-bold">{{ $formattedPrice }}</div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="price-box">
              <div class="d-flex justify-content-between">
                <span class="muted">Subtotal</span>
                <span class="fw-semibold">{{ $formattedPrice }}</span>
              </div>
              <div class="d-flex justify-content-between mt-2">
                <span class="muted">Fees</span>
                <span class="fw-semibold">Rp0</span>
              </div>
              <div class="divider"></div>
              <div class="d-flex justify-content-between">
                <span class="fw-bold">Total</span>
                <span class="fw-bold">{{ $formattedPrice }}</span>
              </div>
              <div class="secure-row">
                <span class="pill">✔ 3DS / secure payment</span>
                <span class="pill">✔ Multiple methods</span>
                <span class="pill">✔ Instant enrollment after success</span>
              </div>
            </div>

            <div class="pay-note mt-3">
              <div class="d-flex gap-2 align-items-start">
                <div style="width:10px;height:10px;border-radius:999px;background:rgba(13,110,253,.9);margin-top:6px;"></div>
                <div class="small">
                  <div class="fw-semibold">You’ll see a payment popup</div>
                  <div class="muted">
                    Complete payment in Midtrans Snap. After success, you’ll be redirected to <b>My Courses</b>.
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <button id="pay-button" class="btn btn-primary w-100 btn-pay mb-2">
                Pay Now
              </button>

              <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-secondary w-100 btn-soft">
                Cancel
              </a>

              <p class="text-center muted small mt-3 mb-0">
                By continuing, you agree to our terms & secure payment processing.
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientKey }}"></script>

<script>
  const payButton = document.getElementById('pay-button');

  function setLoading(isLoading) {
    if (isLoading) {
      payButton.classList.add('loading');
      payButton.innerHTML = 'Processing...';
    } else {
      payButton.classList.remove('loading');
      payButton.innerHTML = 'Pay Now';
    }
  }

  payButton.addEventListener('click', function () {
    setLoading(true);

    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function (result) {
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
            setLoading(false);
          }
        })
        .catch(function () {
          alert("Payment success, but there was an error on our side. Please contact support.");
          setLoading(false);
        });
      },
      onPending: function (result) {
        alert("Your payment is pending.");
        console.log(result);
        setLoading(false);
      },
      onError: function (result) {
        alert("Payment failed.");
        console.log(result);
        setLoading(false);
      },
      onClose: function () {
        console.log('Customer closed the popup without finishing the payment');
        setLoading(false);
      }
    });
  });
</script>
@endsection
