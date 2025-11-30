<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-dark me-4">
            SONARIA
        </a>

        {{-- Center pill navigation --}}
        <div class="d-none d-lg-flex flex-grow-1 justify-content-center">
            <div class="bg-light rounded-pill px-2 py-1 d-inline-flex align-items-center shadow-sm">
                @php
                    $isHome    = request()->routeIs('home');
                    $isCourses = request()->routeIs('courses.*');
                    $isProfile = request()->routeIs('profile.*');
                @endphp

                <a href="{{ route('home') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 {{ $isHome ? 'btn-warning text-white shadow-sm' : 'btn-light text-dark border-0' }}">
                    Home
                </a>

                <a href="{{ route('courses.index') }}"
                   class="btn btn-sm rounded-pill px-4 me-1 {{ $isCourses ? 'btn-warning text-white shadow-sm' : 'btn-light text-dark border-0' }}">
                    Courses
                </a>

                @auth
                    <a href="{{ route('profile.home') }}"
                       class="btn btn-sm rounded-pill px-4 {{ $isProfile ? 'btn-warning text-white shadow-sm' : 'btn-light text-dark border-0' }}">
                        Profile
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-sm rounded-pill px-4 {{ $isProfile ? 'btn-warning text-white shadow-sm' : 'btn-light text-dark border-0' }}">
                        Profile
                    </a>
                @endguest
            </div>
        </div>

        {{-- Right side: auth --}}
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
                <a href="{{ route('register') }}" class="btn btn-warning btn-sm rounded-pill px-3 text-white">
                    Register
                </a>
            @endguest
        </div>
    </div>
</nav>
