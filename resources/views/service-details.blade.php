@extends('layouts.app')

@section('title', $service->title . ' | ' . $siteTitle)
@section('description', strip_tags($service->description))

@section('content')
<!-- Hero Cover Banner -->
<div class="relative w-full min-h-[70vh] lg:min-h-[85vh] flex items-center justify-center overflow-hidden bg-slate-950 pt-24">
    <!-- Backing Grid/Lines & Radial Gradient (Glassmorphism aesthetics) -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-900/40 via-slate-950 to-slate-950 z-0"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#0f172a_1px,transparent_1px),linear-gradient(to_bottom,#0f172a_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-30 z-0"></div>
    
    <!-- Immersive cover background image (if exists) with overlay mask -->
    @if($service->thumbnail_url)
    <div class="absolute inset-0 w-full h-full opacity-20 lg:opacity-30 mix-blend-luminosity z-0">
        <img src="{{ $service->thumbnail_url }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent z-0"></div>
    @endif

    <!-- Floating BACK TO MATRIX Breadcrumb Card -->
    <div class="absolute top-28 left-6 lg:left-12 z-20" data-aos="fade-right">
        <a href="{{ route('services') }}" 
           class="group inline-flex items-center gap-3 px-5 py-3 rounded-full bg-white/5 border border-white/10 hover:border-primary/40 backdrop-blur-md text-[10px] font-black uppercase tracking-[0.2em] text-white hover:text-primary transition-all duration-300 shadow-lg">
            <span class="material-icons text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
            {{ __('BACK TO MATRIX') }}
        </a>
    </div>

    <!-- Hero Content -->
    <div class="max-w-5xl mx-auto px-6 text-center relative z-10 space-y-6 pt-12" data-aos="zoom-out-up">
        <!-- Service Depth Badge -->
        <div class="inline-flex items-center gap-2.5 px-4.5 py-2 rounded-full bg-primary/10 border border-primary/20 shadow-[0_0_15px_rgba(0,135,206,0.1)]">
            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
            <span class="text-[10px] font-black uppercase tracking-[0.25em] text-primary">
                {{ __('SERVICE DEPTH') }}
            </span>
        </div>

        <!-- Huge Uppercase Service Title -->
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-white uppercase tracking-tight leading-none">
            {{ $service->title }}
        </h1>

        <!-- Elegant Description Block -->
        <div class="text-gray-400 font-light leading-relaxed text-lg sm:text-xl max-w-3xl mx-auto border-t border-white/5 pt-6">
            {!! $service->description !!}
        </div>
    </div>
</div>

<!-- ============================================
     SECTION: SEE OUR IMPACT (Projects Grid)
     ============================================ -->
<section class="py-24 md:py-32 bg-background relative overflow-hidden">
    <!-- Subtle backgrounds and glowing ambient vectors -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-secondary/20 to-transparent"></div>
    <div class="absolute top-1/4 left-0 w-[400px] h-[400px] bg-secondary/5 blur-[160px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-[400px] h-[400px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header (Goldenbee UI/UX style: flex row, left title info, right link) -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16 md:mb-20" data-aos="fade-up">
            <div class="space-y-4">
                <div class="flex items-center gap-3 text-secondary font-black tracking-widest text-xs uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                    {{ __('SUCCESS STORIES') }}
                </div>
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-black text-gray-900 tracking-tighter uppercase leading-none">
                    {{ __('SEE OUR IMPACT') }}
                </h2>
            </div>
            <div class="shrink-0">
                <a class="inline-flex items-center gap-2.5 text-secondary font-black tracking-widest text-xs uppercase group hover:text-primary transition-colors duration-300" href="{{ route('projects') }}">
                    {{ __('VIEW ALL WORK') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Project Grid Cards (2-column layout precisely like Goldenbee) -->
        @if($projects && $projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach($projects as $index => $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group relative h-[380px] md:h-[450px] rounded-[48px] md:rounded-[64px] overflow-hidden bg-slate-950 border border-gray-200 shadow-2xl transition-all duration-500 block cursor-pointer"
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                
                <!-- Main Showcase Image with Zoom Parallax Hover -->
                <div class="absolute inset-0 w-full h-full bg-slate-950">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" 
                          class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all duration-1000">
                </div>

                <!-- Deep Dynamic Dark Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-100 transition-opacity duration-700"></div>

                <!-- Info Deck (Sliding vertical layout precisely like Goldenbee) -->
                <div class="absolute inset-0 p-8 md:p-12 flex flex-col justify-end translate-y-6 group-hover:translate-y-0 transition-transform duration-700">
                    <div class="space-y-4">
                        <h4 class="text-3xl md:text-4xl lg:text-5xl font-black text-white tracking-tighter uppercase leading-tight group-hover:text-secondary transition-colors duration-300 mb-6">
                            {{ $project->title }}
                        </h4>
                        
                        <!-- Action Trigger Link (Goldenbee premium explorer) -->
                        <div class="flex items-center gap-3 text-secondary font-black tracking-widest text-[10px] uppercase">
                            {{ __('EXPLORE CASE') }}
                            <div class="w-10 h-10 rounded-full border border-secondary flex items-center justify-center group-hover:bg-secondary group-hover:text-white transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right size-5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300" aria-hidden="true">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <!-- No Projects Empty State -->
        <div class="text-center py-16 bg-white rounded-[40px] border border-gray-200 p-10 max-w-2xl mx-auto" data-aos="fade-up">
            <span class="material-icons text-6xl text-gray-400 mb-4">folder_off</span>
            <h4 class="text-xl font-black text-gray-900 uppercase tracking-tight mb-2">{{ __('No Shadows Yet') }}</h4>
            <p class="text-gray-500 font-light text-sm max-w-sm mx-auto mb-6">
                {{ __('We are actively seeding high-end case studies for this service. In the meantime, see our global portfolio or start yours today!') }}
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary text-white text-xs font-black uppercase tracking-widest shadow-lg shadow-primary/25 hover:bg-primary/90 transition-all">
                {{ __('START YOUR CASE') }}
                <span class="material-icons text-sm">rocket_launch</span>
            </a>
        </div>
        @endif
    </div>


</section>

<!-- ============================================
     SECTION: CORE CAPABILITIES (Numbered features)
     ============================================ -->
<section class="py-24 md:py-32 bg-gray-50 border-t border-b border-gray-200/50 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary/5 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 md:mb-24" data-aos="fade-up">
            <x-section-header 
                badge="{{ __('TECHNICAL ARSENAL') }}"
                title="{{ __('CORE') }} <br/><span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('CAPABILITIES') }}</span>"
                subtitle="{{ __('Explore the architectural standards and advanced frameworks we weaponize to build your platform.') }}"
            />
        </div>

        <!-- Sequential Numbered Capability Grid -->
        @php
            // Extract localized technologies / features
            $capabilities = $service->technologies;
            if(!is_array($capabilities) || count($capabilities) == 0) {
                // Curated high-end fallback
                if(str_contains(strtolower($service->slug), 'mobile-apps') || str_contains(strtolower($service->slug), 'app')) {
                    $capabilities = [
                        __('Premium Swift & Kotlin Native Development'),
                        __('Sleek Multiplatform Flutter Architectures'),
                        __('High-Performance Headless API Pipelines'),
                        __('Premium Micro-Interaction UI Engine'),
                        __('Robust Secure Payment Cryptographies'),
                        __('Seamless App Store Dominance Publishing')
                    ];
                } else {
                    $capabilities = [
                        __('Premium Corporate Headless CMS Engines'),
                        __('Sleek Reactive Frontend Component Architecture'),
                        __('High-Security Edge CDN Frameworks'),
                        __('Elite SEO Speed Optimizations'),
                        __('Intelligent User Behaviour Custom Flows'),
                        __('Robust Automated DevOps Deployment')
                    ];
                }
            }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            @foreach($capabilities as $capIndex => $capability)
            <div class="group relative flex flex-col p-8 md:p-10 rounded-[32px] bg-white border border-gray-150 hover:border-primary/20 hover:shadow-lg transition-all duration-500"
                 data-aos="fade-up" 
                 data-aos-delay="{{ $capIndex * 75 }}">
                
                <!-- Glowing sequential number -->
                <div class="text-4xl sm:text-5xl font-black text-primary/10 group-hover:text-primary/20 tracking-tight transition-colors duration-500 mb-6">
                    {{ sprintf("%02d", $capIndex + 1) }}
                </div>

                <div class="flex-grow">
                    <h3 class="text-lg sm:text-xl font-black text-gray-900 group-hover:text-primary transition-colors leading-snug">
                        {{ $capability }}
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================
     SECTION: DOMINANCE CALL TO ACTION (CTA)
     ============================================ -->
<section class="py-32 bg-slate-950 relative overflow-hidden">
    <!-- Dark glassmorphic background meshes -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,#1e1e24_0%,#09090b_70%)] z-0"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/10 blur-[180px] rounded-full pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10 space-y-10" data-aos="zoom-out-up">
        <!-- Accent indicator -->
        <span class="inline-block text-[9px] font-black uppercase tracking-[0.3em] text-primary/80 border-b border-primary/20 pb-2">
            {{ __('DOMINATE YOUR COMPETITION') }}
        </span>

        <h2 class="text-4xl sm:text-6xl font-black text-white uppercase tracking-tight leading-tight">
            {{ __('READY TO DOMINATE?') }}
        </h2>

        <p class="text-gray-400 font-light text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
            {{ __('Stop building basic. Let\'s partner to engineer an elite digital solution that commands authority, captivates users, and accelerates conversions.') }}
        </p>

        <!-- Dynamic Action Quote Button -->
        <div class="pt-4">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/95 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('START YOUR LEGACY') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection
