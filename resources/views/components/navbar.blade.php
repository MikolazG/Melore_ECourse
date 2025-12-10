<style>
    .navbar-melore .pill-wrapper {
        background-color: #000;
        padding: .2rem .35rem;
        border-radius: 999px;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
    }

    .navbar-melore .pill-link {
        background-color: transparent;
        color: #fff;
        border: 0;
        transition: background-color .15s ease, color .15s ease;
    }

    .navbar-melore .pill-link:hover,
    .navbar-melore .pill-link:focus {
        background-color: rgba(255,255,255,0.12);
        color: #fff;
    }

    .navbar-melore .active-pill,
    .navbar-melore .active-pill:hover,
    .navbar-melore .active-pill:focus,
    .navbar-melore .active-pill:active {
        background-color: #ffffff;
        color: #111 !important;
        box-shadow: 0 0 0 .1rem rgba(0,0,0,.04);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow-sm navbar-melore">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark me-4">
            MÉLORÉ
        </a>

        <div class="d-none d-lg-flex flex-grow-1 justify-content-center">
            @php
                $isHome    = request()->routeIs('home');
                $isCourses = request()->routeIs('courses.*');

                $isProfile = request()->routeIs('profile.*')
                    || request()->routeIs('login')
                    || request()->routeIs('register');
            @endphp

            <div class="pill-wrapper d-inline-flex align-items-center">
                <a href="{{ route('home') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isHome ? 'active-pill' : '' }}">
                    Home
                </a>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isCourses ? 'active-pill' : '' }}">
                    Courses
                </a>

                @auth
                    <a href="{{ route('profile.home') }}"
                       class="btn btn-sm rounded-pill px-4 pill-link {{ $isProfile ? 'active-pill' : '' }}">
                        Profile
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-sm rounded-pill px-4 pill-link {{ $isProfile ? 'active-pill' : '' }}">
                        Profile
                    </a>
                @endguest
            </div>
        </div>

        <div class="d-flex align-items-center ms-3">
            @auth
                <span class="me-3 small text-muted d-none d-md-inline">
                    Hi, {{ Str::limit(auth()->user()->name, 14) }}.
                </span>
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 me-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-dark btn-sm rounded-pill px-3 text-white">
                    Register
                </a>
            @endguest
        </div>
    </div>
</nav>
