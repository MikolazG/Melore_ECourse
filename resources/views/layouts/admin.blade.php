{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MÉLORÉ Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5.2 from public/bootstrap5.2 --}}
    <link href="{{ asset('bootstrap5.2/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Optional: Bootstrap Icons (kalau mau icon) --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
</head>
<body class="bg-light">

    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                MÉLORÉ <span class="fw-normal">Admin Panel</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
                    aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <span class="navbar-text me-3">
                                Hi, {{ auth()->user()->name }} ({{ auth()->user()->role }})
                            </span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Layout with sidebar + content --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <nav class="col-md-3 col-lg-2 d-md-block bg-white border-end min-vh-100 p-0">
                <div class="list-group list-group-flush rounded-0">

                    <a href="{{ route('admin.dashboard') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.courses.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                        Manage Courses
                    </a>



                    {{-- FIXED: sebelumnya pakai nav-link jadi ga sejajar --}}
                    <a href="{{ route('admin.instructors.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('admin.instructors.*') ? 'active' : '' }}">
                        Manage Instructors
                    </a>

                    {{-- Optional: users list (belum dibuat controller-nya) --}}
                    {{-- <a href="#" class="list-group-item list-group-item-action">Users</a> --}}
                </div>
            </nav>

            {{-- Content --}}
            <main class="col-md-9 col-lg-10 ms-sm-auto px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('bootstrap5.2/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
