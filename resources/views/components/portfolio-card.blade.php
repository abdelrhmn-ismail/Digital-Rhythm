@props(['portfolio'])

<a href="{{ route('contact') }}" {{ $attributes->merge(['class' => 'group relative flex flex-col p-8 rounded-3xl bg-white/[0.02] border border-white/[0.05] hover:border-primary/40 hover:bg-white/[0.04] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(245,158,11,0.1)]']) }}>
    <!-- Icon -->
    <div class="mb-6">
        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 group-hover:scale-110 transition-all duration-500">
            <span class="material-icons text-primary text-3xl">{{ $portfolio->icon ?? 'work' }}</span>
        </div>
    </div>

    <!-- Title -->
    <h3 class="text-base font-bold text-white uppercase tracking-wide mb-4 group-hover:text-primary transition-colors duration-300 leading-tight">
        {{ $portfolio->title }}
    </h3>

    <!-- Description -->
    <p class="text-zinc-400 font-light leading-relaxed text-sm mb-6 flex-grow">
        {{ $portfolio->description }}
    </p>

    <!-- Category Badge -->
    @if($portfolio->category)
    <div class="mb-4">
        <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider">
            {{ $portfolio->category }}
        </span>
    </div>
    @endif

    <!-- CTA -->
    <div class="flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest group-hover:gap-3 transition-all duration-300">
        <span>{{ __('EXPLORE') }}</span>
        <span class="material-icons text-sm">arrow_forward</span>
    </div>

    <!-- Hover glow effect -->
    <div class="absolute inset-0 rounded-3xl bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none blur-xl"></div>
</a>
