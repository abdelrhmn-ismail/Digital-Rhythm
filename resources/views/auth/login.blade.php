@php
    $siteTitle = \App\Helpers\SettingsHelper::siteTitle();
    $siteLogo = \App\Helpers\SettingsHelper::siteLogo();
    $favicon = \App\Helpers\SettingsHelper::favicon();
    $colorPrimary = \App\Models\Setting::get('color_primary', '#01194A');
    $colorSecondary = \App\Models\Setting::get('color_secondary', '#0087CE');
    $colorBackground = \App\Models\Setting::get('color_background', '#F8F9FA');
    $colorText = \App\Models\Setting::get('color_text', '#333333');
    $colorSurface = \App\Models\Setting::get('color_surface', '#FFFFFF');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Admin Login') }} - {{ $siteTitle }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Alexandria:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --color-primary: {{ $colorPrimary }};
            --color-secondary: {{ $colorSecondary }};
            --color-background: {{ $colorBackground }};
            --color-surface: {{ $colorSurface }};
            --color-text: {{ $colorText }};
        }
        body {
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 100% 0%, var(--color-primary) 0%, transparent 15%),
                              radial-gradient(circle at 0% 100%, var(--color-secondary) 0%, transparent 15%);
            color: var(--color-text);
            font-family: 'Outfit', 'Alexandria', sans-serif;
            min-height: 100vh;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }
        .btn-theme {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
            color: #fff;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-theme:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(1, 25, 74, 0.3);
            filter: brightness(1.1);
        }
        .text-theme {
            color: var(--color-primary);
        }
        input:focus {
            border-color: var(--color-primary) !important;
            ring-color: var(--color-primary) !important;
        }
        @if(app()->getLocale() == 'ar')
        body { font-family: 'Alexandria', sans-serif !important; }
        @endif
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-4">
        <div class="login-card rounded-xl shadow-2xl p-8">
            <div class="text-center mb-8">
                @if($siteLogo)
                    <img src="{{ $siteLogo }}" alt="{{ $siteTitle }}" class="h-16 mx-auto mb-4">
                @else
                    <h1 class="text-3xl font-bold text-white">{{ $siteTitle }}</h1>
                @endif
                <p class="text-white/70 text-sm mt-2">{{ __('Admin Control Panel') }}</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white mb-2">{{ __('Email Address') }}</label>
                    <input id="email" name="email" type="email" required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                           placeholder="admin@digital-rhythm.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white mb-2">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required
                           class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                           placeholder="••••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input name="remember" type="checkbox" 
                               class="rounded border-white/10 bg-white/5 text-primary focus:ring-primary focus:ring-offset-0">
                        <span class="ml-2 text-sm text-white/70">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 btn-theme font-bold rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background transition-all">
                        {{ __('Sign in to Admin') }}
                    </button>
                </div>

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="mt-4 p-4 bg-red-500/20 border border-red-500/30 rounded-lg">
                        <div class="flex">
                            <span class="material-icons text-red-200">error</span>
                            <div class="ml-3">
                                <p class="text-sm text-red-200">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-white/50 hover:text-white text-sm transition-colors">
                    <span class="material-icons align-middle text-sm mr-1">arrow_back</span>
                    {{ __('Back to Website') }}
                </a>
            </div>
        </div>
    </div>
</body>
</html>



