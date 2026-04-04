@php
    $currentRoute = Route::currentRouteName() ?? 'home';
@endphp

<header class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500 px-4 pointer-events-none flex justify-center" 
        x-data="{ scrolled: false, mobileMenu: false }"
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'pt-2 lg:pt-4' : 'pt-4 lg:pt-6'">
    <div class="relative w-full flex items-center justify-between transition-all duration-700 pointer-events-auto px-4 lg:px-8"
         :class="scrolled ? 'max-w-5xl h-16 lg:h-20 bg-[#050506]/85 backdrop-blur-3xl border border-white/10 rounded-[2rem] shadow-[0_10px_40px_rgba(0,0,0,0.5)]' : 'max-w-7xl h-20 lg:h-24 bg-transparent border-transparent rounded-none'">
        
        <!-- Logo -->
        <a class="group flex items-center" href="{{ route('home') ?? '#' }}">
            <div class="relative flex items-center transition-all duration-500" tabindex="0">
                <img alt="Golden Bee" width="200" height="66" class="w-auto object-contain transition-all duration-500 h-[40px] lg:h-[60px]" src="https://goldenbee.sa/images/Golden-Bee--white-logo.png" />
            </div>
        </a>
        
        <!-- Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-2 p-1">
            <a class="relative px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ $currentRoute == 'home' ? 'text-white' : 'text-zinc-500 hover:text-white' }}" href="{{ route('home') ?? '#' }}">
                <span class="relative z-10">Home</span>
                @if($currentRoute == 'home')
                <div class="absolute inset-0 bg-amber-500/10 border border-amber-500/20 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.1)]"></div>
                @endif
            </a>
            
            <a class="relative px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ $currentRoute == 'about' ? 'text-white' : 'text-zinc-500 hover:text-white' }}" href="{{ route('about') ?? '#' }}">
                <span class="relative z-10">About</span>
                @if($currentRoute == 'about')
                <div class="absolute inset-0 bg-amber-500/10 border border-amber-500/20 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.1)]"></div>
                @endif
            </a>
            
            <a class="relative px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ $currentRoute == 'services' ? 'text-white' : 'text-zinc-500 hover:text-white' }}" href="{{ route('services') ?? '#' }}">
                <span class="relative z-10">Services</span>
                @if($currentRoute == 'services')
                <div class="absolute inset-0 bg-amber-500/10 border border-amber-500/20 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.1)]"></div>
                @endif
            </a>
            
            <a class="relative px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ $currentRoute == 'portfolio' ? 'text-white' : 'text-zinc-500 hover:text-white' }}" href="{{ route('portfolio') ?? '#' }}">
                <span class="relative z-10">Portfolio</span>
                @if($currentRoute == 'portfolio')
                <div class="absolute inset-0 bg-amber-500/10 border border-amber-500/20 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.1)]"></div>
                @endif
            </a>
            
            <a class="relative px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ $currentRoute == 'contact' ? 'text-white' : 'text-zinc-500 hover:text-white' }}" href="{{ route('contact') ?? '#' }}">
                <span class="relative z-10">Contact</span>
                @if($currentRoute == 'contact')
                <div class="absolute inset-0 bg-amber-500/10 border border-amber-500/20 rounded-full shadow-[0_0_15px_rgba(245,158,11,0.1)]"></div>
                @endif
            </a>
        </nav>
        
        <!-- Desktop Actions -->
        <div class="hidden lg:flex items-center gap-6">
            <!-- Language Toggle -->
            <button class="group relative flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/5 border border-white/10 hover:border-amber-500/50 transition-all duration-300 backdrop-blur-md overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-500/0 via-amber-500/5 to-amber-500/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe size-4 text-zinc-400 group-hover:text-amber-500 transition-colors duration-300"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                <div class="relative h-5 min-w-[24px] overflow-hidden">
                    <div class="flex flex-col">
                        <span class="text-[11px] font-bold uppercase tracking-tight text-white h-5 flex items-center justify-center">EN</span>
                    </div>
                </div>
                <div class="size-1 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]"></div>
            </button>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm disabled:opacity-50 outline-none bg-amber-500 hover:bg-amber-400 text-white font-black rounded-full shadow-[0_0_25px_rgba(245,158,11,0.2)] transition-all hover:scale-105 overflow-hidden px-8 h-12" href="{{ route('contact') ?? '#' }}">Get a Quote</a>
        </div>
        
        <!-- Mobile Actions -->
        <div class="lg:hidden flex items-center gap-3 relative z-[1100]">
            <!-- Language Toggle Mobile -->
            <button class="group relative flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/5 border border-white/10 hover:border-amber-500/50 transition-all duration-300 backdrop-blur-md overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-500/0 via-amber-500/5 to-amber-500/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe size-4 text-zinc-400"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
            </button>
            
            <button @click="mobileMenu = !mobileMenu" class="flex items-center justify-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu size-8"><path d="M4 5h16"></path><path d="M4 12h16"></path><path d="M4 19h16"></path></svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu dropdown -->
    <div x-show="mobileMenu" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden absolute top-[100%] left-0 w-full bg-[#050506]/95 backdrop-blur-2xl border-b border-white/10 pointer-events-auto"
         style="display: none;">
        <div class="px-6 py-8 flex flex-col items-center gap-6">
            <a href="{{ route('home') ?? '#' }}" class="text-[14px] font-black uppercase tracking-[0.2em] {{ $currentRoute == 'home' ? 'text-amber-500' : 'text-zinc-500' }}">Home</a>
            <a href="{{ route('about') ?? '#' }}" class="text-[14px] font-black uppercase tracking-[0.2em] {{ $currentRoute == 'about' ? 'text-amber-500' : 'text-zinc-500' }}">About</a>
            <a href="{{ route('services') ?? '#' }}" class="text-[14px] font-black uppercase tracking-[0.2em] {{ $currentRoute == 'services' ? 'text-amber-500' : 'text-zinc-500' }}">Services</a>
            <a href="{{ route('portfolio') ?? '#' }}" class="text-[14px] font-black uppercase tracking-[0.2em] {{ $currentRoute == 'portfolio' ? 'text-amber-500' : 'text-zinc-500' }}">Portfolio</a>
            <a href="{{ route('contact') ?? '#' }}" class="w-full text-center py-4 bg-amber-500 text-white font-black rounded-full mt-4">GET A QUOTE</a>
        </div>
    </div>
</header>
