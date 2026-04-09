@extends('layouts.app')

@section('title', __('Portfolio | Golden Bee'))
@section('description', __('View our global impact projects.'))

@section('content')
<!-- ============================================
     SECTION 1: HERO
     ============================================ -->
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-[#050506]">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-[radial-gradient(ellipse_at_center,_rgba(245,158,11,0.10)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(245,158,11,0.1)]" 
                 data-aos="fade-down" 
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('CASE STUDIES') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-white tracking-tighter leading-[0.85]" 
                data-aos="fade-up" 
                data-aos-delay="300">
                <span class="text-white block mb-2">{{ __('SELECT A') }}</span>
                <span class="text-gradient block relative inline-block">
                    {{ __('DOMAIN') }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-zinc-400 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="400">
                {{ __('Enter our specialized worlds and explore how we transformed ambitions into exceptional results.') }}
            </p>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#050506] to-transparent pointer-events-none"></div>
</section>

<!-- ============================================
     SECTION 2: DOMAIN CARDS GRID
     ============================================ -->
<section class="py-24 md:py-32 bg-[#050506] relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/4 left-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Domain Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach($portfolios as $index => $portfolio)
            <a href="{{ route('contact') }}" 
               class="group relative flex flex-col p-8 rounded-3xl bg-white/[0.02] border border-white/[0.05] hover:border-primary/40 hover:bg-white/[0.04] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(245,158,11,0.1)]"
               data-aos="fade-up" 
               data-aos-delay="{{ ($index % 5) * 50 }}">
                
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

                <!-- CTA -->
                <div class="flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest group-hover:gap-3 transition-all duration-300">
                    <span>{{ __('EXPLORE') }}</span>
                    <span class="material-icons text-sm">arrow_forward</span>
                </div>

                <!-- Hover glow effect -->
                <div class="absolute inset-0 rounded-3xl bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none blur-xl"></div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================
     SECTION 3: CTA
     ============================================ -->
<section class="py-32 md:py-40 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#050506] via-zinc-950/50 to-[#050506]"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[200px] rounded-full"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <!-- Badge -->
        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ __('HAVE A VISION NEEDING REALITY?') }}
        </div>

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-white mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {{ __('START YOUR') }} <span class="text-gradient">{{ __('LEGACY') }}</span>
        </h2>

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(245,158,11,0.3)] hover:shadow-[0_0_50px_rgba(245,158,11,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('START YOUR LEGACY') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection
