@extends('layouts.app')

@section('title', __('Our Services') . ' | ' . $siteTitle)
@section('description', __('Explore our comprehensive digital solutions.'))

@section('content')
<!-- ============================================
     SECTION 1: HERO
     ============================================ -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[600px] bg-[radial-gradient(ellipse_at_center,_rgba(0,135,206,0.12)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(0,135,206,0.1)] hover:border-primary/40 transition-all duration-300" 
                 data-aos="fade-down" 
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('OUR EXPERTISE') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-[0.85]" 
                data-aos="fade-up" 
                data-aos-delay="300">
                <span class="text-gray-900 block mb-2">{{ __('CREATIVE') }}</span>
                <span class="text-gradient block relative inline-block">
                    {{ __('SOLUTIONS') }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="400">
                {{ __('We don\'t just offer services. We engineer holistic strategies designed to secure your brand\'s future in the digital era.') }}
            </p>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>

<!-- ============================================
     SECTION 2: SERVICE CATEGORIES
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/3 right-0 w-[400px] h-[400px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        
        @php
            $orderedCategories = [
                'Branding & Identity' => ['num' => '01', 'desc' => __('Building distinctive visual identities that resonate with your audience and define your market presence.')],
                'Digital Marketing' => ['num' => '02', 'desc' => __('Data-driven marketing campaigns that maximize reach, engagement, and conversions.')],
                'Web Design & Development' => ['num' => '03', 'desc' => __('High-performance websites that blend aesthetics with seamless functionality.')],
                'Production & Events' => ['num' => '04', 'desc' => __('Professional photography, videography, and event coverage that captures every moment.')]
            ];
            $groupedServices = $services->groupBy('category');
        @endphp

        @foreach($orderedCategories as $catName => $catDetails)
            @if($groupedServices->has($catName))
            <div class="mb-32 last:mb-0" data-aos="fade-up" id="category-{{ Str::slug($catName) }}">
                <!-- Category Header -->
                <div class="flex items-center gap-4 mb-12">
                    <div class="text-6xl md:text-8xl font-black text-gray-200">{{ $catDetails['num'] }}</div>
                    <div class="h-px flex-1 bg-gradient-to-r from-primary/30 to-transparent"></div>
                </div>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">
                    {{ __($catName) }}
                </h2>
                <p class="text-lg text-gray-600 font-light mb-12 max-w-3xl">
                    {{ $catDetails['desc'] }}
                </p>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($groupedServices->get($catName) as $service)
                        <x-service-card :service="$service" />
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
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
        <!-- Badge -->
        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ __('CUSTOM SOLUTIONS FOR BOLD GOALS') }}
        </div>

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {{ __('READY TO') }} <span class="text-gradient">{{ __('DOMINATE?') }}</span>
        </h2>

        <!-- Description -->
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-12 font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            {{ __("Let's engineer your custom strategy and unlock your brand\'s full potential.") }}
        </p>

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[300px] bg-primary hover:bg-primary/90 text-white font-black px-14 h-18 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('Get Free Strategy Call') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">phone_in_talk</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection



