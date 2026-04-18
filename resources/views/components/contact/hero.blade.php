<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects (Matching Branding Style) -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-[radial-gradient(ellipse_at_center,_rgba(1,25,74,0.05)_0%,_transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(1,25,74,0.05)]" 
                 data-aos="fade-down" 
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('START THE CLOCK') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-[0.85]" 
                data-aos="fade-up" 
                data-aos-delay="300">
                <span class="text-gray-900 block mb-2">{{ __('INITIATE') }}</span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary block relative inline-block">
                    {{ __('CONTACT') }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="400">
                {{ __('Ready to completely dominate your market? Secure a consultation with our architects today.') }}
            </p>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>
