@props(['partners' => []])

<section class="py-24 relative overflow-hidden bg-white border-y border-gray-200">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <x-section-header 
            badge="{{ __('STRATEGIC PARTNERS') }}"
            title="{{ __('SUPPORTED BY') }} <br/> <span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('GLOBAL LEADERS') }}</span>"
        />
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
