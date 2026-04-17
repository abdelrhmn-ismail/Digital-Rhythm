@props(['partners' => []])

<div class="h-40"></div>
<section class="py-24 relative overflow-hidden bg-white border-y border-gray-200">
    <div class="max-w-7xl mx-auto px-6 mb-12 text-center">
        <p class="text-[10px] font-black uppercase tracking-[0.4em] text-primary/60 mb-4">{{ __('STRATEGIC PARTNERS') }}</p>
    </div>
    
    <div class="flex relative items-center overflow-hidden h-40 md:h-56">
        <div class="absolute left-0 top-0 bottom-0 w-20 md:w-40 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-20 md:w-40 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
        
        <div class="flex w-full overflow-hidden">
            <div class="flex w-max animate-marquee pb-4 pt-4">
                @php
                    // Ensure we have enough items for a smooth marquee
                    $displayPartners = count($partners) > 0 ? $partners : collect([]);
                    // Double it if it's too short for the marquee effect
                    $loopPartners = $displayPartners->count() < 10 ? $displayPartners->concat($displayPartners)->concat($displayPartners)->concat($displayPartners) : $displayPartners->concat($displayPartners);
                @endphp

                @foreach($loopPartners as $partner)
                    <div class="px-8 md:px-12 flex flex-col items-center justify-center gap-4 group transition-all duration-700">
                        <div class="flex flex-col items-center justify-center gap-4 cursor-default">
                            <div class="size-24 md:size-32 flex items-center justify-center relative p-4">
                                <img src="{{ $partner->logo_url }}" 
                                     alt="{{ $partner->name }}" 
                                     class="object-contain transition-all duration-700 group-hover:scale-110 relative z-10 grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100" />
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-foreground/40 group-hover:text-primary transition-colors whitespace-nowrap">{{ $partner->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-background relative overflow-hidden">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-[1px] bg-gradient-to-r from-transparent via-primary/20 to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-16 lg:gap-y-0 text-center">
            @php
                $stats = [
                    ['value' => '15', 'unit' => '+', 'label' => 'YEARS OF MASTERY'],
                    ['value' => '500', 'unit' => '+', 'label' => 'GLOBAL PROJECTS'],
                    ['value' => '120', 'unit' => '+', 'label' => 'ELITE STRATEGIES'],
                    ['value' => '99', 'unit' => '%', 'label' => 'SUCCESS RATE'],
                ];
            @endphp

            @foreach($stats as $stat)
                <div class="relative group flex flex-col items-center" data-aos="fade-up">
                    <div class="space-y-4 px-8">
                        <div class="text-6xl lg:text-8xl font-black text-foreground group-hover:text-primary transition-colors duration-700 tracking-tighter flex items-baseline justify-center gap-1">
                            <div class="text-glow">
                                <span class="counter-value" data-target="{{ $stat['value'] }}">0</span><span>{{ $stat['unit'] }}</span>
                            </div>
                        </div>
                        <div class="text-[10px] lg:text-xs font-black text-muted tracking-[0.4em] uppercase transition-colors group-hover:text-gray-600 duration-500 max-w-[120px]">{{ __($stat['label']) }}</div>
                    </div>
                    @if(!$loop->last)
                        <div class="absolute top-1/2 -translate-y-1/2 w-[1px] h-20 bg-gradient-to-b from-transparent via-white/10 to-transparent hidden lg:block -right-[1px]"></div>
                    @endif
                    <div class="absolute -bottom-8 left-1/4 right-1/4 h-[2px] bg-primary opacity-0 group-hover:opacity-100 blur-[4px] transition-all duration-700"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.1
    };

    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;

                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.innerText = Math.round(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCounter();
                observer.unobserve(counter);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.counter-value').forEach(counter => {
        counterObserver.observe(counter);
    });
});
</script>
