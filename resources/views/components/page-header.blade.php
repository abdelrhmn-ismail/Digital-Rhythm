@props([
    'badge' => null,
    'title' => 'Page Title',
    'subtitle' => null,
    'description' => null,
    'alignment' => 'center', // center, left, right
    'paddingTop' => 'pt-32',
    'paddingBottom' => 'pb-20',
])

@php
    $alignmentClasses = match($alignment) {
        'left' => 'text-left',
        'right' => 'text-right',
        default => 'text-center',
    };
    
    $maxWidth = match($alignment) {
        'left' => 'max-w-3xl',
        'right' => 'max-w-3xl ml-auto',
        default => 'max-w-5xl mx-auto',
    };
@endphp

<section class="relative {{ $paddingTop }} {{ $paddingBottom }} bg-[#050506] overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-[radial-gradient(ellipse_at_center,_rgba(245,158,11,0.10)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="{{ $maxWidth }} mx-auto px-6 lg:px-8 relative z-10">
        <div class="space-y-12 {{ $alignmentClasses }}">

            @if($badge)
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(245,158,11,0.1)]"
                 data-aos="fade-down"
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ $badge }}</span>
            </div>
            @endif

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-white tracking-tighter leading-[0.85]"
                data-aos="fade-up"
                data-aos-delay="300">
                {!! $title !!}
            </h1>

            @if($subtitle)
            <!-- Subtitle with gradient -->
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-black leading-[0.85] tracking-tighter"
                data-aos="fade-up"
                data-aos-delay="350">
                <span class="text-gradient block relative inline-block">
                    {{ $subtitle }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h2>
            @endif

            @if($description)
            <!-- Description -->
            <p class="text-xl md:text-2xl text-zinc-400 max-w-3xl {{ $alignment === 'center' ? 'mx-auto' : '' }} leading-relaxed font-light"
               data-aos="fade-up"
               data-aos-delay="400">
                {{ $description }}
            </p>
            @endif
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#050506] to-transparent pointer-events-none"></div>
</section>
