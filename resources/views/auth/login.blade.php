<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Admin Login - Golden Bee') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #f58d0a 0%, #ea580c 100%);
        }
        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-4">
        <div class="login-card rounded-xl shadow-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">{{ __('Golden Bee') }}</h1>
                <p class="text-orange-100 text-sm mt-2">{{ __('Admin Login') }}</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white mb-2">{{ __('Email Address') }}</label>
                    <input id="email" name="email" type="email" required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent"
                           placeholder="admin@goldenbee.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white mb-2">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent"
                           placeholder="••••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input name="remember" type="checkbox" 
                               class="rounded border-white/20 bg-white/10 text-orange-600 focus:ring-white/50 focus:ring-offset-0">
                        <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 bg-white text-orange-600 font-semibold rounded-lg hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-orange-600 transition-all">
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
                <a href="{{ route('home') }}" class="text-orange-100 hover:text-white text-sm">
                    <span class="material-icons align-middle text-sm mr-1">arrow_back</span>
                    {{ __('Back to Website') }}
                </a>
            </div>
        </div>
    </div>
</body>
</html>
