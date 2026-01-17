@extends('layouts.main')

@section('title', 'Register - MÉLORÉ')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

  .auth-page{
    font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    min-height: calc(100vh - 120px);
    display:flex;
    align-items:center;
    justify-content:center;
    padding: 56px 12px;
  }

  .auth-card{
    width: 100%;
    max-width: 680px;
    border-radius: 22px;
    border: 1px solid rgba(2,6,23,.10);
    box-shadow: 0 26px 85px rgba(2,6,23,.12);
    overflow: hidden;
    background:#fff;
  }

  .auth-header{
    padding: 28px 28px 18px 28px;
    text-align:center;
    background:#fff;
  }

  .brand-pill{
    display:inline-flex;
    align-items:center;
    gap:.5rem;
    padding: .45rem .95rem;
    border-radius:999px;
    border:1px solid rgba(2,6,23,.12);
    background: rgba(2,6,23,.03);
    font-size:.8rem;
    font-weight: 600;
    color: rgba(2,6,23,.70);
  }

  .auth-title{
    margin: 14px 0 6px 0;
    font-weight: 700;
    letter-spacing: -0.03em;
    font-size: 2.1rem;
    line-height: 1.1;
    color: rgba(2,6,23,.92);
  }

  .auth-desc{
    margin: 0;
    font-size: 1rem;
    font-weight: 400;
    color: rgba(2,6,23,.62);
  }

  .divider{height:1px;background: rgba(2,6,23,.08);}

  .auth-body{
    padding: 24px 28px 26px 28px;
    background:#fff;
  }

  .form-shell{
    border-radius: 18px;
    border: 1px solid rgba(2,6,23,.10);
    background: #fff;
    box-shadow: 0 14px 34px rgba(2,6,23,.10);
    padding: 18px;
  }

  .form-label{
    font-weight: 500;
    font-size: .95rem;
    margin-bottom: .45rem;
    color: rgba(2,6,23,.84);
  }

  .auth-input{
    border-radius: 14px;
    border: 1px solid rgba(2,6,23,.14);
    padding: .92rem 1rem;
    background:#fff;
    font-weight: 400;
  }
  .auth-input:focus{
    border-color: rgba(2,6,23,.34);
    box-shadow: 0 0 0 .22rem rgba(2,6,23,.08);
  }

  .btn-eye{
    border-top-right-radius: 14px !important;
    border-bottom-right-radius: 14px !important;
    border: 1px solid rgba(2,6,23,.14);
    background: #fff;
    padding: .92rem 1rem;
    font-weight: 600;
    color: rgba(2,6,23,.70);
  }
  .btn-eye:hover{ background: rgba(2,6,23,.03); }

  .muted{ color: rgba(2,6,23,.62) !important; }

  .btn-black{
    border-radius: 14px;
    padding: 1rem 1rem;
    font-weight: 600;
    background: linear-gradient(180deg, #15151c, #07070a);
    border: 1px solid #0b0b0f;
    box-shadow: 0 16px 30px rgba(2,6,23,.20);
    color: #fff !important;
  }
  .btn-black:hover{
    background: linear-gradient(180deg, #000, #000);
    transform: translateY(-1px);
  }
  .btn-black:disabled{opacity:.9; transform:none;}

  .auth-footer{
    padding: 0 28px 26px 28px;
    text-align:center;
    background:#fff;
  }

  .link-strong{
    color:#0b0b0f;
    font-weight: 600;
    text-decoration:none;
  }
  .link-strong:hover{ text-decoration: underline; }

  .alert-danger{
    border-radius: 14px;
    border: 1px solid rgba(220,53,69,.25);
    background: rgba(220,53,69,.08);
  }
</style>

<div class="auth-page">
  <div class="auth-card">

    <div class="auth-header">
      <span class="brand-pill">Melore • Create Account</span>
      <div class="auth-title">Create Account</div>
      <p class="auth-desc">Fill your details to start learning with MÉLORÉ.</p>
    </div>

    <div class="divider"></div>

    <div class="auth-body">
      @if ($errors->any())
        <div class="alert alert-danger mb-3">
          <div class="fw-semibold mb-1">Please fix the following:</div>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="form-shell">
        <form action="{{ route('register') }}" method="POST" id="registerForm">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Full name</label>
            <input
              type="text"
              name="name"
              id="name"
              class="form-control auth-input"
              value="{{ old('name') }}"
              placeholder="Your name"
              required
              autocomplete="name"
            >
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="form-control auth-input"
              value="{{ old('email') }}"
              placeholder="you@example.com"
              required
              autocomplete="email"
            >
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input
                type="password"
                name="password"
                id="password"
                class="form-control auth-input"
                placeholder="••••••••"
                required
                autocomplete="new-password"
              >
              <button type="button" class="btn-eye" id="togglePassword" aria-label="Toggle password">
                <span id="togglePasswordText">Show</span>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <div class="input-group">
              <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control auth-input"
                placeholder="••••••••"
                required
                autocomplete="new-password"
              >
              <button type="button" class="btn-eye" id="togglePassword2" aria-label="Toggle confirm password">
                <span id="togglePasswordText2">Show</span>
              </button>
            </div>
          </div>

          <button type="submit" class="btn btn-black w-100" id="registerBtn">
            Register
          </button>
        </form>
      </div>
    </div>

    <div class="auth-footer">
      <p class="muted mb-0">
        Already have an account?
        <a class="link-strong" href="{{ route('login') }}">Login</a>
      </p>
    </div>

  </div>
</div>

<script>
  const form = document.getElementById('registerForm');
  const registerBtn = document.getElementById('registerBtn');

  const pwd1 = document.getElementById('password');
  const btn1 = document.getElementById('togglePassword');
  const txt1 = document.getElementById('togglePasswordText');

  const pwd2 = document.getElementById('password_confirmation');
  const btn2 = document.getElementById('togglePassword2');
  const txt2 = document.getElementById('togglePasswordText2');

  btn1?.addEventListener('click', () => {
    const hidden = pwd1.type === 'password';
    pwd1.type = hidden ? 'text' : 'password';
    txt1.textContent = hidden ? 'Hide' : 'Show';
  });

  btn2?.addEventListener('click', () => {
    const hidden = pwd2.type === 'password';
    pwd2.type = hidden ? 'text' : 'password';
    txt2.textContent = hidden ? 'Hide' : 'Show';
  });

  form?.addEventListener('submit', () => {
    registerBtn.disabled = true;
    registerBtn.textContent = 'Creating...';
  });
</script>
@endsection
