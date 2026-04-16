@php
    $siteTitle = \App\Helpers\SettingsHelper::siteTitle();
    $siteDescription = \App\Helpers\SettingsHelper::siteDescription();
    $siteKeywords = \App\Helpers\SettingsHelper::siteKeywords();
    $siteLogo = \App\Helpers\SettingsHelper::siteLogo();
    $favicon = \App\Helpers\SettingsHelper::favicon();
    $colorPrimary = \App\Models\Setting::get('color_primary', '#01194A');
    $colorSecondary = \App\Models\Setting::get('color_secondary', '#0087CE');
    $colorAccent = \App\Models\Setting::get('color_accent', '#7800A8');
    $colorBackground = \App\Models\Setting::get('color_background', '#F8F9FA');
    $colorSurface = \App\Models\Setting::get('color_surface', '#FFFFFF');
    $colorText = \App\Models\Setting::get('color_text', '#333333');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
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
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700;800;900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
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
    <script defer src="{{ asset('js/alpine.js') }}"></script>
    
    <!-- AOS Animation CSS -->
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    
    @stack('styles')

    <!-- Dynamic Theme Colors & Overrides -->
    <style>
        :root {
            /* Branding Variables */
            --color-primary: {{ $colorPrimary }};
            --color-secondary: {{ $colorSecondary }};
            --color-accent: {{ $colorAccent }};
            --color-background: {{ $colorBackground }};
            --color-surface: {{ $colorSurface }};
            --color-text: {{ $colorText }};

            /* Legacy Goldenbee Core Mappings (HSL) */
            --background: {{ \App\Helpers\SettingsHelper::hexToHsl($colorBackground) }};
            --foreground: {{ \App\Helpers\SettingsHelper::hexToHsl($colorText) }};
            --primary: {{ \App\Helpers\SettingsHelper::hexToHsl($colorPrimary) }};
            --secondary: {{ \App\Helpers\SettingsHelper::hexToHsl($colorSecondary) }};
            --accent: {{ \App\Helpers\SettingsHelper::hexToHsl($colorAccent) }};
            --card: {{ \App\Helpers\SettingsHelper::hexToHsl($colorSurface) }};
            --card-foreground: {{ \App\Helpers\SettingsHelper::hexToHsl($colorText) }};
            --popover: {{ \App\Helpers\SettingsHelper::hexToHsl($colorSurface) }};
            --popover-foreground: {{ \App\Helpers\SettingsHelper::hexToHsl($colorText) }};
            --muted: {{ \App\Helpers\SettingsHelper::hexToHsl($colorText) }}; 
            --muted-foreground: {{ \App\Helpers\SettingsHelper::hexToHsl($colorText) }};
            --border: 0 0% 90%;
            --input: 0 0% 90%;
            --ring: {{ \App\Helpers\SettingsHelper::hexToHsl($colorPrimary) }};
        }

        /* Global Theme Fixes */
        body {
            background-color: var(--color-background);
            color: var(--color-text);
        }

        /* Scrollbar Styling for Light Theme */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: var(--color-background);
        }
        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 5px;
            border: 2px solid var(--color-background);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        /* Typography Override for Arabic */
        @if(app()->getLocale() == 'ar')
        body, h1, h2, h3, h4, h5, h6, p, span, a, div, section, article, header, footer, nav, ul, li, button, input, textarea, select, label {
            font-family: 'Alexandria', sans-serif !important;
        }
        .material-icons, .material-symbols-outlined, [class*="material-icons"], [class*="material-symbols"] {
            font-family: 'Material Icons', 'Material Symbols Outlined' !important;
        }
        @endif

        /* Global Utilities */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%) !important;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-brand {
            background: var(--color-primary);
            color: white !important;
            transition: all 0.3s ease;
        }

        .btn-brand:hover {
            background: var(--color-secondary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-background text-foreground" style="{{ app()->getLocale() == 'ar' ? 'font-family: Alexandria, sans-serif;' : '' }}">
    <!-- Navigation -->
    @include('partials.navigation')
    
    <!-- Main Content -->
    <main>
        @include('partials.flash')
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- AOS Animation Script -->
    <script src="{{ asset('js/aos.js') }}"></script>
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



