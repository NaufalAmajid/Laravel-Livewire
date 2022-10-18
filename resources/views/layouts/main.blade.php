<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="{{ asset('template/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('template/bootstrap-icons.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    @livewireStyles

    <title>Laravel Livewire</title>
</head>

<body>
    {{-- Navbar --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Laravel Livewire</a>
            </div>
        </nav>
    </div>

    {{-- Content --}}
    <main class="py-4">
        @yield('content')
    </main>

    <!-- JS -->
    <script src="{{ asset('template/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts
</body>

</html>
