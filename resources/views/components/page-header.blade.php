@props([
    'badge' => null,
    'titleTop' => null,
    'titleBottom' => null,
    'subtitle' => null,
    'minHeight' => 'min-h-[50vh]',
    'badgeDelay' => '200',
    'titleDelay' => '300',
    'subtitleDelay' => '400'
])

<section class="relative {{ $minHeight }} flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects (Matching Branding Style) -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[500px] bg-[radial-gradient(ellipse_at_center,_rgba(1,25,74,0.05)_0%,_transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            @if($badge)
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(1,25,74,0.05)]" 
                 data-aos="fade-down" 
                 data-aos-delay="{{ $badgeDelay }}">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ $badge }}</span>
            </div>
            @endif

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-[1.2]" 
                data-aos="fade-up" 
                data-aos-delay="{{ $titleDelay }}">
                @if($titleTop)
                <span class="text-gray-900 block mb-6 uppercase">{{ $titleTop }}</span>
                @endif
                
                @if($titleBottom)
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary block relative inline-block uppercase py-2">
                    {{ $titleBottom }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
                @endif
            </h1>

            @if($subtitle)
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="{{ $subtitleDelay }}">
                {{ $subtitle }}
            </p>
            @endif

            <!-- Custom Actions Slot -->
            <div data-aos="fade-up" data-aos-delay="500">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>
