@extends('layouts.app')

@section('title', __('Our Services') . ' | ' . $siteTitle)
@section('description', __('Explore our specialized worlds and how we transform ambitions into exceptional results.'))

@section('content')
<x-page-header 
    badge="{{ __('OUR EXPERTISE') }}"
    titleTop="{{ __('CHOOSE YOUR') }}"
    titleBottom="{{ __('DOMAIN') }}"
    subtitle="{{ __('Step into our specialized worlds and witness how we transform your ambitions into exceptional results.') }}"
/>

<!-- ============================================
     SECTION: SERVICES GRID
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/4 left-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-[300px] h-[300px] bg-primary/5 blur-[140px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Domain Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            @foreach($services as $index => $service)
            <a href="{{ route('contact') }}" 
               class="group relative flex flex-col p-10 md:p-12 rounded-[40px] md:rounded-[56px] bg-gray-50 border border-gray-200 hover:bg-white hover:border-primary/30 hover:shadow-[0_20px_50px_rgba(0,0,0,0.05)] transition-all duration-700 hover:-translate-y-2 overflow-hidden min-h-[420px]"
               data-aos="fade-up" 
               data-aos-delay="{{ ($index % 2) * 50 }}">
                
                <!-- Background Decoration -->
                <div class="absolute -right-8 -top-8 w-40 h-40 bg-primary/5 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                
                <!-- Icon -->
                <div class="mb-10 relative z-10">
                    <div class="w-20 h-20 rounded-[24px] bg-white border border-gray-100 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all duration-500 shadow-sm">
                        <span class="material-icons text-primary text-4xl group-hover:text-white transition-colors duration-500">{{ $service->icon ?? 'home_repair_service' }}</span>
                    </div>
                </div>

                <!-- Title & Description -->
                <div class="flex-grow space-y-4 relative z-10">
                    <h3 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tight group-hover:text-primary transition-colors duration-500 leading-tight">
                        {{ $service->title }}
                    </h3>
                    <div class="text-gray-500 font-light leading-relaxed text-lg max-w-md">
                        {!! Str::limit(strip_tags($service->description), 120) !!}
                    </div>
                </div>

                <!-- Footer / CTA -->
                <div class="mt-auto pt-10 relative z-10">
                    <div class="w-full h-px bg-gray-200 group-hover:bg-primary/20 transition-colors duration-500 mb-8"></div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-primary">
                            {{ __('EXPLORE SOLUTION') }}
                        </span>
                        <div class="w-12 h-12 rounded-full border border-gray-200 bg-white flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all duration-500 shadow-sm">
                            <span class="material-icons text-gray-400 group-hover:text-white transition-colors text-sm">arrow_forward</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================
     SECTION: CTA
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
            badge="{{ __('READY TO CREATE') }}"
            title="{{ __('YOUR') }} <br/> <span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('MASTERPIECE?') }}</span>"
            subtitle="{{ __('Let\'s engineer your global success story together. Contact us today for a strategic consultation.') }}"
        />

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('START YOUR LEGACY') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection
