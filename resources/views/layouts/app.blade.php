<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Otobiz | Kemitraan Kepemilikan Kendaraan Produktif')</title>
    @include('partials.seo')
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_favicon.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
    @stack('styles')
</head>
<body>
    @yield('content')

    <script src="{{ asset('assets/js/home.js') }}"></script>
    @stack('scripts')
</body>
</html>
