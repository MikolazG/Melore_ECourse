<style>
    .navbar-melore .pill-link {
        background-color: transparent;
        color: grey;
        border: 0;
        transition: background-color .15s ease, color .15s ease;
    }

    .navbar-melore .pill-link:hover,
    .navbar-melore .pill-link:focus {
        background-color: rgba(255,255,255,0.12);
        color: black;
    }

    .navbar-melore .active-pill,
    .navbar-melore .active-pill:hover,
    .navbar-melore .active-pill:focus,
    .navbar-melore .active-pill:active {
        background-color: black;
        color: white !important;
        box-shadow: 0 0 0 .1rem white
    }

    /* lang switch */
    .lang-seg {
        display: inline-flex;
        padding: 3px;
        border: 1px solid rgba(2,6,23,.12);
        border-radius: 999px;
        background: rgba(255,255,255,.85);
        gap: 4px;
    }
    .lang-seg button {
        border: 0;
        background: transparent;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 600;
        color: rgba(2,6,23,.65);
        line-height: 1;
        transition: .15s ease;
    }
    .lang-seg button:hover { background: rgba(2,6,23,.06); color: rgba(2,6,23,.9); }
    .lang-seg .active {
        background: #0b0b0f;
        color: #fff;
    }
</style>

@php
    $isHome    = request()->routeIs('home');
    $isCourses = request()->routeIs('courses.*');
    $isProfile = request()->routeIs('profile.*')
        || request()->routeIs('login')
        || request()->routeIs('register');

    // current language (default EN)
    $lang = session('lang', 'en');

    // label dictionary
    $t = [
        'en' => [
            'home' => 'Home',
            'courses' => 'Courses',
            'instructors' => 'Instructors',
            'profile' => 'Profile',
            'login' => 'Login',
            'register' => 'Register',
            'logout' => 'Logout',
            'hi' => 'Hi',
            'toggle' => 'Toggle navigation',
        ],
        'id' => [
            'home' => 'Beranda',
            'courses' => 'Kursus',
            'instructors' => 'Instruktur',
            'profile' => 'Profil',
            'login' => 'Masuk',
            'register' => 'Daftar',
            'logout' => 'Keluar',
            'hi' => 'Hai',
            'toggle' => 'Buka navigasi',
        ],
    ];

    $L = $t[$lang] ?? $t['en'];
@endphp

{{-- DESKTOP NAV --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow-sm navbar-melore d-none d-lg-flex">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark me-2">
            MÉLORÉ
        </a>

        <div class="flex-grow-1 d-flex justify-content-center">
            <div class="pill-wrapper d-inline-flex align-items-center">
                <a href="{{ route('home') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isHome ? 'active-pill' : '' }}">
                    {{ $L['home'] }}
                </a>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isCourses ? 'active-pill' : '' }}">
                    {{ $L['courses'] }}
                </a>

                <a href="{{ route('instructors.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link">
                    {{ $L['instructors'] }}
                </a>

                <!-- <a href="{{ route('home') }}">
                     {{ __('nav.home') }}
                </a>

                <a href="{{ route('courses.index') }}">
                    {{ __('nav.courses') }}
                </a>

                <a href="{{ route('instructors.index') }}">
                    {{ __('nav.instructors') }}
                </a> -->

                @auth
                    <a href="{{ route('profile.home') }}"
                       class="btn btn-sm rounded-pill px-4 pill-link {{ $isProfile ? 'active-pill' : '' }}">
                        {{ $L['profile'] }}
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-sm rounded-pill px-4 pill-link {{ $isProfile ? 'active-pill' : '' }}">
                        {{ $L['profile'] }}
                    </a>
                @endguest
            </div>
        </div>

        <div class="d-flex align-items-center ms-3">

            {{-- LANG SWITCH --}}
            <form action="{{ route('lang.switch') }}" method="POST" class="mb-0 me-3">
                @csrf
                <div class="lang-seg">
                    
                    @php $current = app()->getLocale(); @endphp
                    <button type="submit" name="lang" value="en" class="{{ $lang === 'en' ? 'active' : '' }}">EN</button>
                    <button type="submit" name="lang" value="id" class="{{ $lang === 'id' ? 'active' : '' }}">ID</button>
                </div>
            </form>        

            @auth
                <span class="me-3 small text-muted d-none d-xl-inline">
                    {{ $L['hi'] }}, {{ Str::limit(auth()->user()->name, 14) }}.
                </span>
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                        {{ $L['logout'] }}
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 me-2">
                    {{ $L['login'] }}
                </a>
                <a href="{{ route('register') }}" class="btn btn-dark btn-sm rounded-pill px-3 text-white">
                    {{ $L['register'] }}
                </a>
            @endguest
        </div>
    </div>
</nav>

{{-- MOBILE NAV --}}
<nav class="navbar navbar-light bg-white border-bottom sticky-top shadow-sm d-flex d-lg-none">
    <div class="container">

        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark">
            MÉLORÉ
        </a>

        <div class="d-flex align-items-center gap-2">
            {{-- LANG SWITCH (MOBILE) --}}
            <form action="{{ route('lang.switch') }}" method="POST" class="mb-0">
                @csrf
                <div class="lang-seg">
                    <button type="submit" name="lang" value="en" class="{{ $lang === 'en' ? 'active' : '' }}">EN</button>
                    <button type="submit" name="lang" value="id" class="{{ $lang === 'id' ? 'active' : '' }}">ID</button>
                </div>
            </form>

            <button class="navbar-toggler border-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#meloreNavbarMobile"
                    aria-controls="meloreNavbarMobile"
                    aria-expanded="false"
                    aria-label="{{ $L['toggle'] }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse mt-2" id="meloreNavbarMobile">
            <ul class="navbar-nav w-100">

                <li class="nav-item mb-1">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ $isHome ? 'fw-semibold' : '' }}">
                        {{ $L['home'] }}
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('courses.index') }}"
                       class="nav-link {{ $isCourses ? 'fw-semibold' : '' }}">
                        {{ $L['courses'] }}
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('instructors.index') }}" class="nav-link">
                        {{ $L['instructors'] }}
                    </a>
                </li>

                <li class="nav-item mb-3">
                    @auth
                        <a href="{{ route('profile.home') }}"
                           class="nav-link {{ $isProfile ? 'fw-semibold' : '' }}">
                            {{ $L['profile'] }}
                        </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                           class="nav-link {{ $isProfile ? 'fw-semibold' : '' }}">
                            {{ $L['profile'] }}
                        </a>
                    @endguest
                </li>

                @auth
                    <li class="nav-item mb-2">
                        <span class="nav-link disabled small">
                            {{ $L['hi'] }}, {{ Str::limit(auth()->user()->name, 20) }}.
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark w-100 rounded-pill">
                                {{ $L['logout'] }}
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item mb-2">
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-dark w-100 rounded-pill">
                            {{ $L['login'] }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                           class="btn btn-dark w-100 rounded-pill text-white">
                            {{ $L['register'] }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
