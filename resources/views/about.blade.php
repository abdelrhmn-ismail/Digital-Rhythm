@extends('layouts.app')

@section('title', __('About Us') . ' | ' . $siteTitle)
@section('description', __('Learn about') . ' ' . $siteTitle . ' ' . __('Marketing Agency - Your partner in digital dominance.'))

@section('content')
<!-- ============================================
     SECTION 1: HERO
     ============================================ -->
<section class="relative min-h-[75vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[radial-gradient(ellipse_at_center,_rgba(0,135,206,0.08)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(0,135,206,0.1)] hover:border-primary/40 transition-all duration-300" 
                 data-aos="fade-down" 
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('WHO WE ARE') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-[0.85]" 
                data-aos="fade-up" 
                data-aos-delay="300">
                <span class="text-gray-900 block mb-2">{{ __('WE ARE') }}</span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary block relative inline-block">
                    {{ strtoupper($siteTitle) }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="400">
                {{ __('We are architects of digital transformation. A collective of visionaries, strategists, and creators dedicated to forging global market leaders.') }}
            </p>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>

<!-- ============================================
     SECTION 2: COMPANY STORY
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/2 right-0 w-[400px] h-[400px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="max-w-4xl mx-auto mb-20 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" 
                 data-aos="zoom-in">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                {{ __('OUR LEGACY') }}
            </div>
            <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-gray-900 mb-8 leading-tight tracking-tighter" 
                data-aos="fade-up">
                {{ __('INNOVATION IS NOT') }} <br/> <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('AN ACCIDENT.') }}</span>
            </h2>
        </div>

        <!-- Story Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Text -->
            <div class="space-y-8" data-aos="fade-right">
                <p class="text-lg md:text-xl text-gray-600 font-light leading-relaxed">
                    {{ __('Founded in the hyper-growth core of Riyadh,') }} {{ $siteTitle }} {{ __('was architected to redefine digital narratives through clinical strategy and raw creativity. We don\'t just build marketing campaigns. We blueprint digital empires that communicate with intelligence and scale with purpose.') }}
                </p>
                <p class="text-lg text-gray-600 font-light leading-relaxed">
                    {{ __('At') }} {{ $siteTitle }}{{ __(', we don\'t just execute marketing—we engineer comprehensive growth ecosystems. Our methodology is rooted in an aggressive pursuit of perfection, merging cutting-edge data science with unparalleled creative intuition.') }}
                </p>
            </div>

            <!-- Right: Feature List -->
            <div class="space-y-6" data-aos="fade-left" data-aos-delay="200">
                <div class="group p-6 rounded-2xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                            <span class="material-icons text-primary text-2xl">location_on</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ __('From Riyadh to the World') }}</h4>
                            <p class="text-gray-600 font-light leading-relaxed">
                                {{ __('From Riyadh to the world, our specialized teams operate as an extension of your brand, dissecting market gaps and deploying surgical strategies that ensure your digital footprint is impossible to ignore.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="group p-6 rounded-2xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                            <span class="material-icons text-primary text-2xl">calendar_today</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ __('Engineering Brands Since 2018') }}</h4>
                            <p class="text-gray-600 font-light leading-relaxed">
                                {{ __('For over 7 years, we have been crafting digital experiences that drive growth, build trust, and establish market dominance for brands across the globe.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION 3: MISSION & VALUES
     ============================================ -->
<section class="py-24 md:py-32 bg-gray-50 relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[600px] bg-primary/5 blur-[180px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Mission Section -->
        <div class="max-w-4xl mx-auto mb-32 text-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" 
                 data-aos="zoom-in">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                {{ __('OUR MISSION') }}
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-8 leading-tight tracking-tighter" 
                data-aos="fade-up">
                {{ __('TO EMPOWER ORGANIZATIONS') }}
            </h2>
            <p class="text-xl text-gray-600 font-light leading-relaxed" 
               data-aos="fade-up" 
               data-aos-delay="200">
                {{ __('To empower organizations by transmuting their vision into a high-performance digital reality through clinical strategy.') }}
            </p>
        </div>

        <!-- Core Values Grid -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px]" 
                 data-aos="zoom-in">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                {{ __('CORE PRINCIPLES') }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Value 1: Professionalism -->
            <div class="group relative flex flex-col h-full p-10 rounded-3xl bg-white border border-gray-200 hover:border-primary/30 hover:shadow-xl transition-all duration-700 hover:-translate-y-2" 
                 data-aos="fade-up" 
                 data-aos-delay="100">
                <div class="mb-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-[0_0_20px_rgba(0,135,206,0.1)] group-hover:bg-primary group-hover:text-primary-foreground group-hover:shadow-[0_0_30px_rgba(0,135,206,0.3)] group-hover:scale-110 transition-all duration-700">
                        <span class="material-icons text-3xl">verified</span>
                    </div>
                    <span class="absolute -bottom-3 -right-2 text-3xl font-black text-gray-400/30 group-hover:text-primary/20 transition-colors duration-700 tracking-tighter">01</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-primary transition-colors duration-500 tracking-tight uppercase">
                    {{ __('PROFESSIONALISM') }}
                </h3>
                <p class="text-gray-600 leading-relaxed font-light text-sm group-hover:text-gray-700 transition-colors duration-500">
                    {{ __('We adhere to the most rigorous global benchmarks of quality in every strategic layer.') }}
                </p>
                <div class="absolute bottom-0 left-10 right-10 h-[2px] bg-gradient-to-r from-transparent via-primary/0 to-transparent group-hover:via-primary/50 transition-all duration-1000"></div>
            </div>

            <!-- Value 2: Creativity -->
            <div class="group relative flex flex-col h-full p-10 rounded-3xl bg-white border border-gray-200 hover:border-primary/30 hover:shadow-xl transition-all duration-700 hover:-translate-y-2" 
                 data-aos="fade-up" 
                 data-aos-delay="200">
                <div class="mb-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-[0_0_20px_rgba(0,135,206,0.1)] group-hover:bg-primary group-hover:text-primary-foreground group-hover:shadow-[0_0_30px_rgba(0,135,206,0.3)] group-hover:scale-110 transition-all duration-700">
                        <span class="material-icons text-3xl">palette</span>
                    </div>
                    <span class="absolute -bottom-3 -right-2 text-3xl font-black text-gray-400/30 group-hover:text-primary/20 transition-colors duration-700 tracking-tighter">02</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-primary transition-colors duration-500 tracking-tight uppercase">
                    {{ __('CREATIVITY') }}
                </h3>
                <p class="text-gray-600 leading-relaxed font-light text-sm group-hover:text-gray-700 transition-colors duration-500">
                    {{ __('We engineer non-linear solutions that thrust your brand to the forefront of the marketplace.') }}
                </p>
                <div class="absolute bottom-0 left-10 right-10 h-[2px] bg-gradient-to-r from-transparent via-primary/0 to-transparent group-hover:via-primary/50 transition-all duration-1000"></div>
            </div>

            <!-- Value 3: Results -->
            <div class="group relative flex flex-col h-full p-10 rounded-3xl bg-white border border-gray-200 hover:border-primary/30 hover:shadow-xl transition-all duration-700 hover:-translate-y-2" 
                 data-aos="fade-up" 
                 data-aos-delay="300">
                <div class="mb-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-[0_0_20px_rgba(0,135,206,0.1)] group-hover:bg-primary group-hover:text-primary-foreground group-hover:shadow-[0_0_30px_rgba(0,135,206,0.3)] group-hover:scale-110 transition-all duration-700">
                        <span class="material-icons text-3xl">trending_up</span>
                    </div>
                    <span class="absolute -bottom-3 -right-2 text-3xl font-black text-gray-400/30 group-hover:text-primary/20 transition-colors duration-700 tracking-tighter">03</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-primary transition-colors duration-500 tracking-tight uppercase">
                    {{ __('RESULTS') }}
                </h3>
                <p class="text-gray-600 leading-relaxed font-light text-sm group-hover:text-gray-700 transition-colors duration-500">
                    {{ __('Our architecture is optimized for tangible ROI and sustainable performance metrics.') }}
                </p>
                <div class="absolute bottom-0 left-10 right-10 h-[2px] bg-gradient-to-r from-transparent via-primary/0 to-transparent group-hover:via-primary/50 transition-all duration-1000"></div>
            </div>

            <!-- Value 4: Partnership -->
            <div class="group relative flex flex-col h-full p-10 rounded-3xl bg-white border border-gray-200 hover:border-primary/30 hover:shadow-xl transition-all duration-700 hover:-translate-y-2" 
                 data-aos="fade-up" 
                 data-aos-delay="400">
                <div class="mb-8 relative">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary shadow-[0_0_20px_rgba(0,135,206,0.1)] group-hover:bg-primary group-hover:text-primary-foreground group-hover:shadow-[0_0_30px_rgba(0,135,206,0.3)] group-hover:scale-110 transition-all duration-700">
                        <span class="material-icons text-3xl">handshake</span>
                    </div>
                    <span class="absolute -bottom-3 -right-2 text-3xl font-black text-gray-400/30 group-hover:text-primary/20 transition-colors duration-700 tracking-tighter">04</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-4 group-hover:text-primary transition-colors duration-500 tracking-tight uppercase">
                    {{ __('PARTNERSHIP') }}
                </h3>
                <p class="text-gray-600 leading-relaxed font-light text-sm group-hover:text-gray-700 transition-colors duration-500">
                    {{ __('Your success is the definitive metric of our own. We win when our partners win.') }}
                </p>
                <div class="absolute bottom-0 left-10 right-10 h-[2px] bg-gradient-to-r from-transparent via-primary/0 to-transparent group-hover:via-primary/50 transition-all duration-1000"></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION 4: STATS
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/5 blur-[160px] rounded-full"></div>
    </div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12" data-aos="fade-up">
            <!-- Stat 1: Global Clients -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">groups</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="50">
                    0+
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('Global Clients') }}
                </div>
            </div>

            <!-- Stat 2: Leads Generated -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">lead</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="5" data-suffix="M+">
                    0M+
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('Leads Gen') }}
                </div>
            </div>

            <!-- Stat 3: Awards -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">emoji_events</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="12" data-suffix="">
                    0
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('Awards Won') }}
                </div>
            </div>

            <!-- Stat 4: Commitment -->
            <div class="text-center group">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary/10 group-hover:bg-primary/20 transition-colors duration-500">
                    <span class="material-icons text-3xl text-primary">star</span>
                </div>
                <div class="text-5xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary mb-2 counter" data-target="100" data-suffix="%">
                    0%
                </div>
                <div class="text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-gray-500 group-hover:text-gray-600 transition-colors">
                    {{ __('Commitment') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION 5: CTA
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
            {{ __('READY TO DOMINATE?') }}
        </div>

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {{ __('YOUR NEXT') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('SUCCESS STORY') }}</span>
        </h2>

        <!-- Description -->
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-12 font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            {{ __("Let's blueprint your next success story with surgical precision and engineer your digital empire.") }}
        </p>

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-12 h-16 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('Start Your Journey') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
// Counter Animation for Stats
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-target'));
        const suffix = element.getAttribute('data-suffix') || '+';
        const duration = 2000;
        const startTime = performance.now();
        
        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(target * easeOut);
            
            element.textContent = current + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };
        
        requestAnimationFrame(updateCounter);
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => observer.observe(counter));
});
</script>
@endpush
@endsection



