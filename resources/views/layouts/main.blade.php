<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méloré</title>

    <link rel="stylesheet" href="/css/global.css">
    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('components.footer')

</body>
</html>
