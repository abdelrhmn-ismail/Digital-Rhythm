<section class="py-32 md:py-40 relative overflow-hidden bg-white">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50/50 to-white"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 blur-[200px] rounded-full"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <!-- Badge -->
        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ __('READY TO TRANSFORM') }}
        </div>

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {{ __('YOUR BRAND?') }}
        </h2>

        <!-- Description -->
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-12 font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            {{ __("Let's engineer your global success story together. Contact us today for a strategic consultation.") }}
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('contact') }}"
               class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_4px_20px_rgba(1,25,74,0.25)] hover:shadow-[0_8px_30px_rgba(1,25,74,0.4)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('START YOUR JOURNEY') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">rocket_launch</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>

            <a href="{{ route('portfolio') }}"
               class="group inline-flex items-center justify-center gap-3 min-w-[280px] border border-gray-300 bg-white hover:bg-gray-50 hover:border-primary/40 text-gray-900 font-bold px-12 h-16 rounded-full text-lg backdrop-blur-sm transition-all duration-300 hover:scale-105 active:scale-95">
                {{ __('View Our Work') }}
                <span class="material-icons text-xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </div>
</section>



