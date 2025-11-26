@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/css/register.css">

<div class="register-wrapper">

    <div class="register-card">

        {{-- LEFT IMAGE --}}
        <div class="register-left">
            <img src="/images/login.jpg" class="register-img" alt="Guitar player">
        </div>

        {{-- RIGHT FORM --}}
        <div class="register-right">

            <div class="logo">MÉLORÉ</div>

            <h2 class="register-title">Welcome to MÉLORÉ!</h2>
            <p class="register-sub">Sign in with your credentials to access your personalized experience.</p>

            {{-- NAME --}}
            <label class="label">Name</label>
            <input type="text" class="m-input" placeholder="Enter your full name">

            {{-- EMAIL --}}
            <label class="label">Email</label>
            <input type="email" class="m-input" placeholder="Enter your active email address">

            {{-- PASSWORD --}}
            <label class="label">Password</label>

            <div class="password-wrapper">
                <input id="password-field" type="password" class="m-input password-input" placeholder="Enter your password">

                <span id="toggle-password" class="eye-icon">
                    <!-- SVG MATA -->
                    <svg id="eye-open" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
            </div>

            {{-- BUTTON --}}
            <button class="m-btn-black">Sign In</button>

            <p class="signup-text">Already have an account? <a href="/login">Sign In</a></p>

        </div>

    </div>

</div>


{{-- PASSWORD TOGGLE SCRIPT --}}
<script>
document.getElementById("toggle-password").onclick = () => {
    const input = document.getElementById("password-field");

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
};
</script>

@endsection
