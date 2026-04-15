@php
    $siteTitle = \App\Helpers\SettingsHelper::siteTitle();
    $siteLogo = \App\Helpers\SettingsHelper::siteLogo();
    $favicon = \App\Helpers\SettingsHelper::favicon();
    $colorPrimary = \App\Models\Setting::get('color_primary', '#F59E0B');
    $colorSecondary = \App\Models\Setting::get('color_secondary', '#D97706');
    $colorBackground = \App\Models\Setting::get('color_background', '#F8F9FA');
    $colorSurface = \App\Models\Setting::get('color_surface', '#FFFFFF');
    $colorText = \App\Models\Setting::get('color_text', '#333333');
    $adminSidebarBg = \App\Models\Setting::get('admin_sidebar_bg', '#1e293b'); // Default dark sidebar
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Admin')) - {{ $siteTitle }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Alexandria:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
    
    <style>
        :root {
            --color-primary: {{ $colorPrimary }};
            --color-secondary: {{ $colorSecondary }};
            --color-background: {{ $colorBackground }};
            --color-surface: {{ $colorSurface }};
            --color-text: {{ $colorText }};
            --sidebar-bg: {{ $adminSidebarBg }};
        }

        .admin-sidebar {
            background-color: var(--sidebar-bg) !important;
            background-image: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, transparent 100%);
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .admin-nav-item.active {
            background-color: var(--color-primary) !important;
            color: #000 !important;
        }

        .admin-nav-item:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn-primary, .bg-primary {
            background-color: #2563eb !important; /* Professional Admin Blue */
            border-color: #1d4ed8 !important;
            color: #ffffff !important;
        }

        .hover-bg-primary:hover {
            background-color: #1d4ed8 !important;
        }

        .text-primary {
            color: var(--color-primary) !important;
        }

        .border-primary {
            border-color: var(--color-primary) !important;
        }

        .focus-ring-primary:focus {
            --tw-ring-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
        }

        /* Unified Headings and Overrides */
        h1, h2, h3, h4, h5, h6 {
            color: var(--color-text) !important;
        }

        .admin-header {
            background-color: var(--color-surface) !important;
            border-bottom-color: rgba(0,0,0,0.05) !important;
        }

        .admin-body {
            background-color: var(--color-background) !important;
        }

        .admin-card, .bg-white {
            background-color: var(--color-surface) !important;
            color: var(--color-text) !important;
        }

        .text-gray-900:not(.admin-sidebar *), 
        .text-gray-800:not(.admin-sidebar *), 
        .text-gray-700:not(.admin-sidebar *),
        .text-gray-600:not(.admin-sidebar *) {
            color: var(--color-text) !important;
        }

        .bg-gray-50, .bg-gray-100 {
            background-color: var(--color-background) !important;
        }

        .admin-sidebar h3 {
            color: rgba(255, 255, 255, 0.5) !important;
        }
        
        .admin-sidebar .admin-nav-item:not(.active) {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        @if(app()->getLocale() == 'ar')
        body, h1, h2, h3, h4, h5, h6, p, span, a, div, section, article, header, footer, nav, ul, li, button, input, textarea, select, label {
            font-family: 'Alexandria', sans-serif !important;
        }
        .material-icons, .material-symbols-outlined, [class*="material-icons"], [class*="material-symbols"] {
            font-family: 'Material Icons', 'Material Symbols Outlined' !important;
        }
        @endif
    </style>
</head>
<body class="admin-body text-gray-900 antialiased" style="{{ app()->getLocale() == 'ar' ? 'font-family: Alexandria, sans-serif;' : '' }}">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="admin-sidebar w-64 min-h-screen text-white shadow-xl">
            <div class="flex h-16 items-center justify-center border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold flex items-center gap-2">
                    @if($siteLogo)
                        <img src="{{ $siteLogo }}" alt="{{ $siteTitle }}" class="h-8">
                    @endif
                    <span class="hidden sm:inline">{{ $siteTitle }}</span>
                </a>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <h3 class="text-xs uppercase text-gray-300 font-semibold">{{ __('Main') }}</h3>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="material-icons">dashboard</span>
                            {{ __('Dashboard') }}
                        </a>
                    </div>
                </div>
                
                <div class="px-4 mt-8">
                    <h3 class="text-xs uppercase text-gray-300 font-semibold">{{ __('Content Management') }}</h3>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('admin.testimonials.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <span class="material-icons">format_quote</span>
                            {{ __('Testimonials') }}
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <span class="material-icons">business_center</span>
                            {{ __('Services') }}
                        </a>
                        <a href="{{ route('admin.portfolios.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                            <span class="material-icons">work</span>
                            {{ __('Portfolio') }}
                        </a>
                        <a href="{{ route('admin.gallery.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                            <span class="material-icons">photo_library</span>
                            {{ __('Gallery') }}
                        </a>
                    </div>
                </div>
                
                <div class="px-4 mt-8">
                    <h3 class="text-xs uppercase text-gray-300 font-semibold">{{ __('System') }}</h3>
                    <div class="mt-3 space-y-1">
                        @if(Route::has('admin.users.index'))
                        <a href="{{ route('admin.users.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <span class="material-icons">people</span>
                            {{ __('Users') }}
                        </a>
                        @endif
                        @if(Route::has('admin.contacts.index'))
                        <a href="{{ route('admin.contacts.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <span class="material-icons">mail</span>
                            {{ __('Contact Messages') }}
                        </a>
                        @endif
                        <a href="{{ route('admin.translations.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.translations.*') ? 'active' : '' }}">
                            <span class="material-icons">translate</span>
                            {{ __('Translations') }}
                        </a>
                        @if(Route::has('admin.settings.index'))
                        <a href="{{ route('admin.settings.index') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <span class="material-icons">settings</span>
                            {{ __('Settings') }}
                        </a>
                        @endif
                        <a href="{{ route('home') }}" class="admin-nav-item flex items-center gap-3 rounded-lg px-3 py-2 text-sm">
                            <span class="material-icons">home</span>
                            {{ __('View Website') }}
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="admin-header shadow-sm border-b">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <h1 class="text-lg font-semibold">@yield('title', __('Dashboard'))</h1>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700" title="{{ __('View Website') }}">
                                <span class="material-icons">visibility</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-gray-700" title="Logout">
                                    <span class="material-icons">logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @if(session('success'))
                    <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        function toggleFeatured(entity, id) {
            fetch(`/admin/${entity}/${id}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function toggleActive(entity, id) {
            fetch(`/admin/${entity}/${id}/toggle-active`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
    @stack('scripts')
</body>
</html>



