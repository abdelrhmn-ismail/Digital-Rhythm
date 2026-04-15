<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Admin')) - Golden Bee</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Alexandria:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
<body class="bg-gray-100 text-gray-900 antialiased" style="{{ app()->getLocale() == 'ar' ? 'font-family: Alexandria, sans-serif;' : '' }}">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="admin-sidebar w-64 min-h-screen text-foreground shadow-xl">
            <div class="flex h-16 items-center justify-center border-b border-orange-700">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">Golden Bee Admin</a>
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
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <h1 class="text-lg font-semibold text-gray-900">@yield('title', __('Dashboard'))</h1>
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
