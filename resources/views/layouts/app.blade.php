<!DOCTYPE html>
<html lang="en" dir="ltr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Golden Bee | Global Creative Agency in Riyadh')</title>
    <meta name="description" content="@yield('description', 'Golden Bee Marketing Agency in Riyadh - Engineering global impact through branding, digital strategy, and high-performance web solutions.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/goldenbee/site.css') }}">
    @stack('styles')
</head>
<body class="goldenbee-body bg-background text-white antialiased">
    @include('partials.navigation')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="{{ asset('js/goldenbee/site.js') }}"></script>
    @stack('scripts')
</body>
</html>
