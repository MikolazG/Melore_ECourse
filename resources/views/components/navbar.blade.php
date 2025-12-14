
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
</style>

@php
    $isHome    = request()->routeIs('home');
    $isCourses = request()->routeIs('courses.*');
    $isProfile = request()->routeIs('profile.*')
        || request()->routeIs('login')
        || request()->routeIs('register');
@endphp


<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow-sm navbar-melore d-none d-lg-flex">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark me-2">
            MÉLORÉ
        </a>

        <div class="flex-grow-1 d-flex justify-content-center">
            <div class="pill-wrapper d-inline-flex align-items-center">
                <a href="{{ route('home') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isHome ? 'active-pill' : '' }}">
                    Home
                </a>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link {{ $isCourses ? 'active-pill' : '' }}">
                    Courses
                </a>

                <a href="{{ route('instructors.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 pill-link">
                    Instructors
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
                <span class="me-3 small text-muted d-none d-xl-inline">
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


<nav class="navbar navbar-light bg-white border-bottom sticky-top shadow-sm d-flex d-lg-none">
    <div class="container">

        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark">
            MÉLORÉ
        </a>

        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#meloreNavbarMobile"
                aria-controls="meloreNavbarMobile"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-2" id="meloreNavbarMobile">
            <ul class="navbar-nav w-100">

                <li class="nav-item mb-1">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ $isHome ? 'fw-semibold' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="{{ route('courses.index') }}"
                       class="nav-link {{ $isCourses ? 'fw-semibold' : '' }}">
                        Courses
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="#instructors" class="nav-link">
                        Instructors
                    </a>
                </li>

                <li class="nav-item mb-3">
                    @auth
                        <a href="{{ route('profile.home') }}"
                           class="nav-link {{ $isProfile ? 'fw-semibold' : '' }}">
                            Profile
                        </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                           class="nav-link {{ $isProfile ? 'fw-semibold' : '' }}">
                            Profile
                        </a>
                    @endguest
                </li>

                @auth
                    <li class="nav-item mb-2">
                        <span class="nav-link disabled small">
                            Hi, {{ Str::limit(auth()->user()->name, 20) }}.
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark w-100 rounded-pill">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item mb-2">
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-dark w-100 rounded-pill">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                           class="btn btn-dark w-100 rounded-pill text-white">
                            Register
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
