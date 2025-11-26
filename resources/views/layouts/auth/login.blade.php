@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/css/login.css">

<div class="login-wrapper">

    <div class="login-card">

        {{-- LEFT IMAGE --}}
        <div class="login-left">
            <img src="/images/login.jpg" class="login-img" alt="Guitar player">
        </div>

        {{-- RIGHT FORM --}}
        <div class="login-right">

            <div class="logo">MÉLORÉ</div>

            <h2 class="login-title">Welcome to MÉLORÉ!</h2>
            <p class="login-sub">Sign in with your credentials to access your personalized experience.</p>

            <label class="label">Email</label>
            <input type="text" class="m-input" placeholder="Enter your email or username">

            <label class="label">Password</label>
            <input type="password" class="m-input" placeholder="Enter your password">

            <div class="flex-between">
                <label><input type="checkbox"> Remember me</label>
                <a class="forgot" href="#">Forgot Password</a>
            </div>

            <button class="m-btn-black">Sign In</button>

            <button class="m-btn-google">
                <img src="/images/google.png" class="google-icon">
                Sign in with Google
            </button>

            <p class="signup-text">Don’t have an account? <a href="/register">Sign Up</a></p>

        </div>

    </div>

</div>
@endsection
