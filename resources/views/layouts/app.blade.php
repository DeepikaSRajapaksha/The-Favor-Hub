<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Optional custom CSS --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        footer {
            background: #212529;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
        .navbar-brand {
            font-weight: 600;
        }
    </style>

    @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Main Page Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
