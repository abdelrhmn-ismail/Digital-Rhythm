@php
    $siteTitle = \App\Helpers\SettingsHelper::siteTitle();
    $siteDescription = \App\Helpers\SettingsHelper::siteDescription();
    $siteKeywords = \App\Helpers\SettingsHelper::siteKeywords();
    $siteLogo = \App\Helpers\SettingsHelper::siteLogo();
    $favicon = \App\Helpers\SettingsHelper::favicon();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $siteTitle . ' | Global Creative Agency in Riyadh')</title>
    <meta name="description" content="@yield('description', $siteDescription)">
    <meta name="keywords" content="@yield('keywords', $siteKeywords)">
    <meta name="author" content="{{ $siteTitle }}">
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $favicon }}">
    <link rel="shortcut icon" type="image/png" href="{{ $favicon }}">
    <link rel="apple-touch-icon" href="{{ $favicon }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', $siteTitle . ' | Global Creative Agency in Riyadh')">
    <meta property="og:description" content="@yield('description', $siteDescription)">
    <meta property="og:image" content="@yield('og_image', $siteLogo)">
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:site_name" content="{{ $siteTitle }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', $siteTitle . ' | Global Creative Agency in Riyadh')">
    <meta property="twitter:description" content="@yield('description', $siteDescription)">
    <meta property="twitter:image" content="@yield('og_image', $siteLogo)">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet">

    <!-- Goldenbee Exact Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/goldenbee-core.css') }}">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @stack('styles')
    @if(app()->getLocale() == 'ar')
    <style>
        body, h1, h2, h3, h4, h5, h6, p, span, a, div, section, article, header, footer, nav, ul, li, button, input, textarea, select, label {
            font-family: 'Alexandria', sans-serif !important;
        }
        /* Preserve Material Icons font */
        .material-icons, .material-symbols-outlined, [class*="material-icons"], [class*="material-symbols"] {
            font-family: 'Material Icons', 'Material Symbols Outlined' !important;
        }
    </style>
    @endif
</head>
<body class="bg-gray-900 text-white" style="{{ app()->getLocale() == 'ar' ? 'font-family: Alexandria, sans-serif;' : '' }}">
    <!-- Navigation -->
    @include('partials.navigation')
    
    <!-- Main Content -->
    <main>
        @include('partials.flash')
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50,
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
