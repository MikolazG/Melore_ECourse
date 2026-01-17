@extends('layouts.main')

@section('title', 'Login - MÉLORÉ')

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

  /* IMPORTANT: body jangan ada gradient abu2 */
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

  .remember-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-top: 14px;
    margin-bottom: 16px;
  }

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
      <span class="brand-pill">Melore • Secure Login</span>
      <div class="auth-title">Welcomeback</div>
      <p class="auth-desc">Please enter your email and password to continue.</p>
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
        <form action="{{ route('login') }}" method="POST" id="loginForm">
          @csrf

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
              autofocus
              autocomplete="email"
            >
          </div>

          <div class="mb-1">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input
                type="password"
                name="password"
                id="password"
                class="form-control auth-input"
                placeholder="••••••••"
                required
                autocomplete="current-password"
              >
              <button type="button" class="btn-eye" id="togglePassword" aria-label="Toggle password">
                <span id="togglePasswordText">Show</span>
              </button>
            </div>
          </div>

          <div class="remember-row">
            <div class="form-check">
              <input type="checkbox" name="remember" id="remember" class="form-check-input">
              <label for="remember" class="form-check-label muted">Remember me</label>
            </div>
          </div>

          <button type="submit" class="btn btn-black w-100" id="loginBtn">
            Login
          </button>
        </form>
      </div>
    </div>

    <div class="auth-footer">
      <p class="muted mb-0">
        Don’t have an account?
        <a class="link-strong" href="{{ route('register') }}">Register</a>
      </p>
    </div>

  </div>
</div>

<script>
  const toggleBtn = document.getElementById('togglePassword');
  const pwd = document.getElementById('password');
  const txt = document.getElementById('togglePasswordText');
  const loginBtn = document.getElementById('loginBtn');
  const form = document.getElementById('loginForm');

  toggleBtn?.addEventListener('click', () => {
    const hidden = pwd.type === 'password';
    pwd.type = hidden ? 'text' : 'password';
    txt.textContent = hidden ? 'Hide' : 'Show';
  });

  form?.addEventListener('submit', () => {
    loginBtn.disabled = true;
    loginBtn.textContent = 'Signing in...';
  });
</script>
@endsection
