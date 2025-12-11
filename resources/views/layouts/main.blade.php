<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MÉLORÉ - Music Course Platform')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('bootstrap5.2/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.navbar')

    <main class="py-4">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @include('components.footer')

    <script src="{{ asset('bootstrap5.2/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
