@extends('layouts.app')

@section('title', __('Our Projects Portfolio') . ' | ' . $siteTitle)
@section('description', __('Browse our premium case studies and custom solutions engineered to dominate.'))

@section('content')
<x-page-header 
    badge="{{ __('PORTFOLIO') }}"
    titleTop="{{ __('EXPLORE OUR') }}"
    titleBottom="{{ __('CREATIONS') }}"
    subtitle="{{ __('Browse through our high-end digital creations, mobile apps, and custom web systems tailored for excellence.') }}"
/>

<!-- ============================================
     SECTION: PROJECTS PORTFOLIO HUB
     ============================================ -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Background visual assets and glowing accents -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/3 left-0 w-[400px] h-[400px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/3 right-0 w-[400px] h-[400px] bg-secondary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header (Goldenbee UI/UX style: unified design system header) -->
        <x-section-header 
            badge="{{ __('SUCCESS STORIES') }}"
            title="{{ __('SEE OUR') }} <br/><span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('IMPACT') }}</span>"
            subtitle="{{ __('Explore real-world projects where we engineered dominance and generated dynamic returns.') }}"
        />

        <!-- Portfolio Cards Grid (2-column wide layout precisely like Goldenbee) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach($projects as $index => $project)
            <a href="{{ route('projects.show', $project) }}"
               x-show="filterProject('{{ $project->service_id }}')"
               x-transition:enter="transition ease-out duration-500"
               x-transition:enter-start="opacity-0 scale-95"
               x-transition:enter-end="opacity-100 scale-100"
               class="group relative h-[380px] md:h-[450px] rounded-[48px] md:rounded-[64px] overflow-hidden bg-slate-950 border border-gray-200 shadow-2xl transition-all duration-500 block"
               data-aos="fade-up" 
               data-aos-delay="{{ ($index % 2) * 100 }}">
                
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
                        <span class="text-[9px] font-black uppercase tracking-widest text-secondary bg-secondary/10 border border-secondary/20 px-3.5 py-1.5 rounded-full inline-block">
                            {{ $project->service ? $project->service->title : __('Custom Solution') }}
                        </span>
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
    </div>


</section>

<!-- ============================================
     SECTION: DYNAMIC CALL TO ACTION
     ============================================ -->
<section class="py-32 md:py-40 bg-white relative overflow-hidden ">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[200px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <x-section-header 
            badge="{{ __('READY TO CREATE') }}"
            title="{{ __('YOUR') }} <br/> <span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('MASTERPIECE?') }}</span>"
            subtitle="{{ __('Let\'s engineer your global success story together. Contact us today for a strategic consultation.') }}"
        />

        <div data-aos="fade-up" data-aos-delay="200" class="mt-12">
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
