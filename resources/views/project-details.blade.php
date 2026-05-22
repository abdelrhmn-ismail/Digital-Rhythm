@extends('layouts.app')

@section('title', $project->title . ' | ' . $siteTitle)
@section('description', strip_tags($project->description))

@section('content')
<div class="bg-background min-h-screen relative overflow-hidden selection:bg-primary/30">
    <!-- Glowing background vectors and mesh grids -->
    <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50/50 to-white z-0"></div>
    <div class="absolute top-1/4 left-0 w-[500px] h-[500px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-[500px] h-[500px] bg-secondary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-40 pb-24 md:pt-56 md:pb-40">
        
        <!-- Back to Archive Button -->
        <div class="mb-16 md:mb-24" data-aos="fade-right">
            <a class="inline-flex items-center gap-6 text-gray-500 hover:text-primary transition-all duration-500 text-[10px] md:text-xs font-black uppercase tracking-[0.4em] group" href="{{ route('projects') }}">
                <div class="w-12 h-12 rounded-full border border-gray-200 bg-white flex items-center justify-center group-hover:border-primary/50 group-hover:bg-primary/10 transition-all duration-500 shadow-sm">
                    @if(app()->getLocale() == 'ar')
                        <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    @else
                        <span class="material-icons text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    @endif
                </div>
                {{ __('BACK TO ARCHIVE') }}
            </a>
        </div>

        <div class="space-y-32 md:space-y-48">
            
            <!-- Hero Showcase Area -->
            <div class="relative space-y-16" data-aos="fade-up">
                <!-- Cover Image aspect-[21/9] -->
                <div class="relative aspect-video md:aspect-[21/9] w-full rounded-[48px] md:rounded-[64px] overflow-hidden border border-gray-150 shadow-2xl group bg-gray-100">
                    <img alt="{{ $project->title }}" 
                         class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-110 opacity-90 group-hover:opacity-100"
                         src="{{ $project->image_url }}" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    
                    <!-- Dynamic Absolute PROJECT Badge -->
                    <div class="absolute top-6 right-6 md:top-10 md:right-10 px-6 py-2 rounded-full border border-white/20 bg-white/20 backdrop-blur-md text-white text-[10px] font-black tracking-[0.3em] uppercase shadow-sm">
                        {{ __('PROJECT') }}
                    </div>
                </div>

                <!-- Titles and Accents -->
                <div class="space-y-8 max-w-5xl">
                    <div class="flex items-center gap-4 text-primary font-black tracking-[0.4em] text-xs uppercase">
                        <span class="w-12 h-px bg-primary/30"></span>
                        {{ $project->service ? $project->service->title : __('Custom Solution') }}
                    </div>
                    <h1 class="text-4xl sm:text-6xl md:text-[80px] lg:text-[110px] font-black text-gray-900 tracking-tighter leading-[0.9] uppercase break-words">
                        {{ $project->title }}
                    </h1>
                </div>
            </div>

            <!-- Specifications Grid Matrix -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 pb-20 border-b border-gray-200 items-start" data-aos="fade-up">
                <div class="space-y-3">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] block">{{ __('CLIENT') }}</span>
                    <span class="text-xl md:text-2xl font-bold text-gray-900 uppercase tracking-tighter leading-none">
                        {{ $project->client ?? __('General Client') }}
                    </span>
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] block">{{ __('CORE SERVICE') }}</span>
                    <span class="text-xl md:text-2xl font-bold text-primary uppercase tracking-tighter leading-none">
                        {{ $project->service ? $project->service->title : __('Custom Solution') }}
                    </span>
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] block">{{ __('DATE') }}</span>
                    <span class="text-xl md:text-2xl font-bold text-gray-900 uppercase tracking-tighter leading-none">
                        {{ $project->formatted_completed_date ?? '2026' }}
                    </span>
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] block">{{ __('LOCATION') }}</span>
                    <span class="text-xl md:text-2xl font-bold text-gray-900 uppercase tracking-tighter leading-none">
                        {{ __('Riyadh – Saudi Arabia') }}
                    </span>
                </div>
            </div>

            <!-- Core Specs Layout (Split columns) -->
            <div class="space-y-24">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                    
                    <!-- Left Side: Technical Arsenal / Tech Stack -->
                    <div class="lg:col-span-1 space-y-8" data-aos="fade-up">
                        <div class="p-8 rounded-[32px] border border-gray-200 bg-gray-50/40 backdrop-blur-md shadow-sm">
                            <div class="flex items-center gap-3 text-primary font-black tracking-widest text-[10px] uppercase mb-8">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-primary">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg>
                                {{ __('TECH STACK') }}
                            </div>
                            
                            @php
                                // Retrieve technologies dynamically from associated service (forced to English) or define default stack
                                $techStack = [];
                                if ($project->service) {
                                    $techs = $project->service->getTranslation('technologies', 'en');
                                    if (is_string($techs)) {
                                        $techs = json_decode($techs, true) ?: [];
                                    }
                                    if (is_array($techs)) {
                                        $techStack = array_slice($techs, 0, 6);
                                    }
                                }
                                
                                // Beautiful fallbacks if empty
                                if (empty($techStack)) {
                                    if ($project->service && str_contains(strtolower($project->service->slug), 'mobile-apps')) {
                                        $techStack = ['Swift', 'Kotlin', 'Flutter', 'Node.js', 'PostgreSQL', 'APIs'];
                                    } else {
                                        $techStack = ['Next.js', 'React.js', 'Tailwind CSS', 'Laravel API', 'PostgreSQL', 'CDN Edge'];
                                    }
                                }
                            @endphp

                            <div class="flex flex-wrap gap-2.5">
                                @foreach($techStack as $tech)
                                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-xs font-mono text-gray-600 shadow-sm">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Platform Live Link (If exists) -->
                        @if($project->project_url)
                        <div class="p-8 rounded-[32px] border border-gray-200 bg-white/70 backdrop-blur-md flex items-center justify-between group shadow-sm">
                            <div class="space-y-1">
                                <span class="text-[8px] font-black text-primary uppercase tracking-[0.25em] block">{{ __('DIGITAL ADDRESS') }}</span>
                                <span class="text-sm font-bold text-gray-900 tracking-tight">{{ parse_url($project->project_url, PHP_URL_HOST) }}</span>
                            </div>
                            <a href="{{ $project->project_url }}" target="_blank" 
                               class="w-12 h-12 rounded-full bg-primary hover:bg-primary/80 flex items-center justify-center text-white transition-all duration-300 shadow-lg shadow-primary/20 hover:scale-105 active:scale-95">
                                <span class="material-icons text-lg">open_in_new</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Right Side: Features & Description -->
                    <div class="lg:col-span-2 space-y-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="space-y-6">
                            <div class="flex items-center gap-4 text-primary font-black tracking-widest text-xs uppercase mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                {{ __('FEATURES & EXECUTION') }}
                            </div>
                            <div class="text-xl md:text-2xl text-gray-600 font-light leading-relaxed prose max-w-none">
                                {!! $project->description !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Image Gallery Showcase Grid -->
            @if($project->images_urls && count($project->images_urls) > 0)
            <div class="space-y-10 pt-16 border-t border-gray-200" data-aos="fade-up">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight uppercase">{{ __('PROJECT GALLERY') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($project->images_urls as $imgIndex => $imageUrl)
                    <div class="relative w-full rounded-[32px] overflow-hidden border border-gray-200 bg-gray-50 aspect-video group shadow-xl">
                        <img alt="Gallery {{ $imgIndex }}" 
                             loading="lazy" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-90 group-hover:opacity-100" 
                             src="{{ $imageUrl }}" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                            <span class="text-white font-black text-[10px] tracking-widest uppercase border border-white/20 px-6 py-3 rounded-full bg-black/30 backdrop-blur-sm shadow-lg">
                                {{ __('VIEW IMAGE') }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Related Creations (Discover More) -->
            @if($relatedProjects && $relatedProjects->count() > 0)
            <div class="space-y-16" data-aos="fade-up">
                <div class="flex items-center gap-6">
                    <h3 class="text-gray-400 text-xs font-black tracking-[0.3em] uppercase shrink-0">
                        {{ __('DISCOVER MORE') }}
                    </h3>
                    <div class="h-px flex-grow bg-gray-200"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $relatedIndex => $relProject)
                    <a class="group p-8 rounded-[40px] border border-gray-200 bg-gray-55/50 hover:bg-white hover:border-primary/30 hover:shadow-lg transition-all duration-500 flex flex-col justify-between" 
                       href="{{ route('projects.show', $relProject) }}">
                        <div>
                            <!-- Related Image Aspect-video -->
                            <div class="relative aspect-video rounded-3xl overflow-hidden mb-8 border border-gray-150 shadow-md">
                                <img src="{{ $relProject->image_url }}" alt="{{ $relProject->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors uppercase tracking-tight">
                                {{ $relProject->title }}
                            </h4>
                            <p class="text-xs text-gray-500 font-light line-clamp-2">
                                {{ strip_tags($relProject->description) }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2 text-gray-400 text-[9px] font-black uppercase tracking-[0.2em] group-hover:text-primary transition-colors mt-8">
                            {{ __('EXPLORE CASE') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Dominance Call to Action (CTA) -->
            <div class="relative p-12 lg:p-24 rounded-[48px] md:rounded-[64px] bg-gray-55 border border-gray-200 text-center overflow-hidden group shadow-xl" data-aos="zoom-out">
                <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50/50 to-white z-0 pointer-events-none"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary/5 blur-[180px] rounded-full pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col items-center gap-10">
                    <h3 class="text-4xl md:text-7xl font-black text-gray-900 tracking-tighter leading-none uppercase">
                        {{ __('READY FOR') }} <br/> 
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('REVOLUTION?') }}</span>
                    </h3>
                    <p class="text-gray-500 text-base md:text-xl font-light max-w-2xl mx-auto leading-relaxed">
                        {{ __('Let’s transform your vision into tangible reality and architect a new global success story.') }}
                    </p>
                    <div class="pt-4">
                        <a class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/95 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden" 
                           href="{{ route('contact') }}">
                            <span class="relative z-10">{{ __('START YOUR LEGACY') }}</span>
                            <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
