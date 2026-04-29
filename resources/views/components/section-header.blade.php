@props([
    'badge' => null,
    'title' => null,
    'subtitle' => null,
    'centered' => true,
    'badgeDelay' => '200',
    'titleDelay' => '300',
    'subtitleDelay' => '400'
])

<div class="{{ $centered ? 'text-center mx-auto' : '' }} max-w-4xl mb-24 flex flex-col {{ $centered ? 'items-center' : 'items-start' }}">
    @if($badge)
    <!-- Badge -->
    <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.4em] uppercase text-[10px] md:text-xs mb-8 shadow-[0_0_20px_rgba(1,25,74,0.1)]" 
         data-aos="zoom-in" 
         data-aos-delay="{{ $badgeDelay }}">
        <div class="flex gap-1">
            <span class="w-1 h-1 rounded-full bg-primary"></span>
            <span class="w-1 h-1 rounded-full bg-primary"></span>
            <span class="w-1 h-1 rounded-full bg-primary"></span>
        </div>
        {{ $badge }}
    </div>
    @endif

    <!-- Headline -->
    <h2 class="text-4xl md:text-7xl lg:text-8xl font-black text-gray-900 mb-8 leading-tight tracking-tighter" 
        data-aos="fade-up" 
        data-aos-delay="{{ $titleDelay }}">
        {!! $title !!}
    </h2>

    @if($subtitle)
    <!-- Subtitle -->
    <p class="text-lg md:text-2xl text-gray-600 font-light leading-relaxed {{ $centered ? 'max-w-3xl' : '' }}" 
       data-aos="fade-up" 
       data-aos-delay="{{ $subtitleDelay }}">
        {{ $subtitle }}
    </p>
    @endif
</div>
