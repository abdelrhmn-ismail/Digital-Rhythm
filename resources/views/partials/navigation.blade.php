@php
    $currentRoute = Route::currentRouteName() ?? 'home';
    $navItems = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Portfolio', 'route' => 'portfolio'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header
    class="goldenbee-header fixed inset-x-0 top-0 z-[100] px-4 pt-4 lg:px-6"
    x-data="{ mobileMenu: false, scrolled: false }"
    @scroll.window="scrolled = window.pageYOffset > 24"
>
    <div class="mx-auto flex max-w-7xl items-center justify-between rounded-[2rem] border border-white/10 bg-black/20 px-5 py-4 backdrop-blur-xl transition-all duration-500 lg:px-8"
        :class="scrolled ? 'max-w-6xl bg-[#050506]/90 shadow-[0_24px_80px_rgba(0,0,0,0.45)]' : 'bg-black/25'">
        <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="https://goldenbee.sa/images/Golden-Bee--white-logo.png"
                alt="Golden Bee"
                class="h-10 w-auto object-contain lg:h-14"
            >
        </a>

        <nav class="hidden items-center gap-2 lg:flex">
            @foreach ($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="rounded-full px-5 py-2 text-[11px] font-black uppercase tracking-[0.24em] transition-all duration-300 {{ $currentRoute === $item['route'] ? 'bg-amber-500/10 text-white shadow-[0_0_24px_rgba(245,158,11,0.12)]' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-3 lg:flex">
            <a href="https://goldenbee.sa/ar" class="goldenbee-chip" aria-label="Arabic version">AR</a>
            <a href="{{ route('contact') }}" class="goldenbee-button goldenbee-button--primary">
                Get a Quote
            </a>
        </div>

        <div class="flex items-center gap-3 lg:hidden">
            <a href="https://goldenbee.sa/ar" class="goldenbee-chip" aria-label="Arabic version">AR</a>
            <button
                type="button"
                class="goldenbee-menu-toggle"
                @click="mobileMenu = !mobileMenu"
                :aria-expanded="mobileMenu.toString()"
                aria-label="Toggle navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <div
        x-show="mobileMenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="mx-auto mt-3 max-w-7xl rounded-[2rem] border border-white/10 bg-[#050506]/95 px-6 py-6 backdrop-blur-2xl lg:hidden"
        style="display: none;"
    >
        <div class="flex flex-col gap-4">
            @foreach ($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="rounded-2xl border border-white/5 px-4 py-3 text-center text-sm font-bold uppercase tracking-[0.2em] {{ $currentRoute === $item['route'] ? 'bg-amber-500 text-black' : 'bg-white/[0.03] text-zinc-300' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>
