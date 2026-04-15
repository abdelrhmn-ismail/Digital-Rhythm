@props([
    'badge' => null,
    'title' => 'Ready to Transform Your Brand?',
    'description' => 'Join the elite brands that have transformed their vision into global impact.',
    'buttonText' => 'Get Started',
    'buttonRoute' => null,
    'buttonUrl' => null,
])

<section {{ $attributes->merge(['class' => 'py-32 md:py-40 relative overflow-hidden']) }}>
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-background via-zinc-950/50 to-background"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[200px] rounded-full"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10">
        @if($badge)
        <!-- Badge -->
        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ $badge }}
        </div>
        @endif

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-foreground mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {!! nl2br(e($title)) !!}
        </h2>

        <!-- Description -->
        <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto font-light" data-aos="fade-up" data-aos-delay="150">
            {{ $description }}
        </p>

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="200">
            @if($buttonRoute)
            <a href="{{ route($buttonRoute) }}"
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ $buttonText }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
            @elseif($buttonUrl)
            <a href="{{ $buttonUrl }}"
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ $buttonText }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
            @endif
        </div>
    </div>
</section>



