<!DOCTYPE html>
<html lang="en">
@php
    $siteTitle = __(\App\Helpers\SettingsHelper::siteTitle());
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Admin Register') }} - {{ strtoupper($siteTitle) }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 100% 0%, #01194A 0%, transparent 15%),
                              radial-gradient(circle at 0% 100%, #0087CE 0%, transparent 15%);
        }
        .register-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }
        .register-card input {
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #1e293b;
        }
        .register-card input:focus {
            border-color: #01194A;
            ring-color: #01194A;
        }
        .btn-register {
            background: linear-gradient(135deg, #01194A 0%, #0087CE 100%);
            color: #fff;
        }
        .btn-register:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-4">
        <div class="register-card rounded-xl shadow-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-black text-[#01194A] tracking-tighter">{{ strtoupper($siteTitle) }}</h1>
                <p class="text-gray-500 text-sm mt-2 uppercase tracking-[0.2em] font-bold">{{ __('Admin Registration') }}</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                @csrf
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-foreground mb-2">{{ __('Full Name') }}</label>
                    <input id="name" name="name" type="text" required
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01194A]/20 transition-all"
                           placeholder="John Doe">
                    @error('name')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-foreground mb-2">{{ __('Email Address') }}</label>
                    <input id="email" name="email" type="email" required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01194A]/20 transition-all"
                           placeholder="admin@digital-rhythm.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-foreground mb-2">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" required
                           class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01194A]/20 transition-all"
                           placeholder="••••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-foreground mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                           class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01194A]/20 transition-all"
                           placeholder="••••••••••">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-200">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full btn-register flex justify-center py-4 px-4 font-black rounded-lg transition-all shadow-lg shadow-[#01194A]/10">
                        {{ __('Create Admin Account') }}
                    </button>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mt-4 p-4 bg-red-500/20 border border-red-500/30 rounded-lg">
                        <div class="flex">
                            <span class="material-icons text-red-200">error</span>
                            <div class="ml-3">
                                @foreach ($errors->all() as $error)
                                    <p class="text-sm text-red-200">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-orange-100 text-sm mb-2">
                    {{ __('Already have an account?') }}
                </p>
                <a href="{{ route('login') }}" class="text-foreground hover:text-orange-100 text-sm font-medium">
                    <span class="material-icons align-middle text-sm mr-1">login</span>
                    {{ __('Sign In') }}
                </a>
            </div>
        </div>
    </div>
</body>
</html>



