@extends('layouts.app')

@section('title', __('Our Portfolio') . ' | ' . $siteTitle)
@section('description', __('View our global impact projects.'))

@section('content')
<x-page-header 
    badge="{{ __('CASE STUDIES') }}"
    titleTop="{{ __('SELECT A') }}"
    titleBottom="{{ __('DOMAIN') }}"
    subtitle="{{ __('Enter our specialized worlds and explore how we transformed ambitions into exceptional results.') }}"
/>

<!-- ============================================
     SECTION 2: DOMAIN CARDS GRID
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/4 left-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Domain Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach($portfolios as $index => $portfolio)
            <a href="{{ route('contact') }}" 
               class="group relative flex flex-col p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/40 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(0,135,206,0.1)]"
               data-aos="fade-up" 
               data-aos-delay="{{ ($index % 5) * 50 }}">
                
                <!-- Image/Icon -->
                <div class="mb-6 h-14">
                    @if($portfolio->thumbnail)
                        <img src="{{ $portfolio->thumbnail_url }}" alt="{{ $portfolio->title }}" 
                             class="w-14 h-14 rounded-2xl object-cover group-hover:scale-110 transition-all duration-500 shadow-sm border border-primary/10">
                    @else
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 group-hover:scale-110 transition-all duration-500">
                            <span class="material-icons text-primary text-3xl">{{ $portfolio->icon ?? 'work' }}</span>
                        </div>
                    @endif
                </div>

                <!-- Title -->
                <h3 class="text-base font-bold text-gray-900 uppercase tracking-wide mb-4 group-hover:text-primary transition-colors duration-300 leading-tight">
                    {{ $portfolio->title }}
                </h3>

                <!-- Description -->
                <p class="text-gray-600 font-light leading-relaxed text-sm mb-6 flex-grow">
                    {!! $portfolio->description !!}
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
    <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50/50 to-white"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[200px] rounded-full"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <x-section-header 
            badge="{{ __('HAVE A VISION NEEDING REALITY?') }}"
            title="{{ __('START YOUR') }} <br/> <span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('LEGACY') }}</span>"
        />

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('START YOUR LEGACY') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection



