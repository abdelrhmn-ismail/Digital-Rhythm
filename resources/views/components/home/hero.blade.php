<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] bg-[radial-gradient(ellipse_at_center,_rgba(1,25,74,0.05)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 md:pt-40 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(1,25,74,0.1)] hover:border-primary/40 hover:shadow-[0_0_30px_rgba(1,25,74,0.2)] transition-all duration-300 pointer-events-auto"
                 data-aos="fade-down"
                 data-aos-delay="200">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-75 animate-ping"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('Global Marketing Agency') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-normal"
                data-aos="fade-up"
                data-aos-delay="300">
                <span class="text-gray-900 block mb-2">{{ __('TRANSLATE YOUR') }}</span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary block relative inline-block">
                    {{ __('VISION INTO REALITY') }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light"
               data-aos="fade-up"
               data-aos-delay="400">
                {{ __('Your premier creative partner specializing in digital dominance, bespoke branding, and global scale.') }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center pt-8"
                 data-aos="fade-up"
                 data-aos-delay="500">

                <!-- Primary CTA -->
                <a class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_4px_20px_rgba(1,25,74,0.25)] hover:shadow-[0_8px_30px_rgba(1,25,74,0.4)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden"
                   href="{{ route('contact') }}">
                    <span class="relative z-10">{{ __('Get a Quote') }}</span>
                    <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </a>

                <!-- Secondary CTA -->
                <a class="group inline-flex items-center justify-center gap-3 min-w-[280px] border border-gray-300 bg-white hover:bg-gray-50 hover:border-primary/40 text-gray-900 font-bold px-12 h-16 rounded-full text-lg backdrop-blur-sm transition-all duration-300 hover:scale-105 active:scale-95"
                   href="{{ route('portfolio') }}">
                    <span>{{ __('Explore Our Portfolio') }}</span>
                    <span class="material-icons text-xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>



