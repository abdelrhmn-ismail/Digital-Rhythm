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
                    $partners = [
                        'Adwaa Namar', 'Olye Spa', 'Noble Smile', 'Software Art', 
                        'Strong Motors', 'ALoeVera Construction', 'Pure Health', 
                        'Fantastic Care', 'Healthy Clinics', 'Loqma Wafia', 
                        'Takadi Law', 'Sky House', 'Care Plus', 'Drr Aljazera', 
                        'Almugheb', 'Perstige', 'LioraFlower'
                    ];
                @endphp

                @foreach(array_merge($partners, $partners) as $name)
                    <div class="px-8 md:px-12 flex flex-col items-center justify-center gap-4 group transition-all duration-700">
                        <div class="flex flex-col items-center justify-center gap-4 cursor-default">
                            <div class="size-24 md:size-32 flex items-center justify-center relative p-4">
                                <img src="https://placehold.co/200x80/ffffff/01194A?text={{ urlencode($name) }}" 
                                     alt="{{ $name }}" 
                                     class="object-contain transition-all duration-700 group-hover:scale-110 relative z-10 grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100" />
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-foreground/40 group-hover:text-primary transition-colors whitespace-nowrap">{{ $name }}</span>
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

<section class="py-24 md:py-40 bg-background relative overflow-hidden">
    <div class="absolute bottom-1/2 right-[-10%] w-[600px] h-[600px] bg-primary/5 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-24 flex flex-col items-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.4em] uppercase text-[10px] md:text-xs mb-8" data-aos="zoom-in">
                <div class="flex -space-x-1">
                    <div class="w-2 h-2 rounded-full bg-primary/40 border border-background"></div>
                    <div class="w-2 h-2 rounded-full bg-primary/40 border border-background"></div>
                    <div class="w-2 h-2 rounded-full bg-primary/40 border border-background"></div>
                </div>
                {{ __('TESTIMONIALS') }}
            </div>
            <h2 class="text-5xl md:text-8xl font-black text-foreground mb-8 leading-normal tracking-tighter" data-aos="fade-up">
                {{ __('THE VOICE OF') }} <br/> 
                <span class="bg-clip-text text-transparent bg-gradient-primary text-glow text-shimmer">{{ __('GLOBAL TRUST') }}</span>
            </h2>
            <p class="text-lg md:text-2xl text-muted font-light leading-relaxed max-w-3xl" data-aos="fade-up">
                {{ __('We engineer growth for those who dare to define the future. Their success is our only metric.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up">
            @php
                $testimonials = [
                    [
                        'text' => 'A world-class creative team that engineered our brand transformation with surgical precision and global impact.',
                        'name' => 'Mohammed Al-Otaibi',
                        'role' => 'CEO, Clinics Healthy',
                        'initial' => 'M'
                    ],
                    [
                        'text' => 'Stunning execution and unwavering commitment. Their digital strategies delivered results that far exceeded our KPI targets.',
                        'name' => 'Sarah Al-Ahmad',
                        'role' => 'Marketing Manager, Spa Olyé',
                        'initial' => 'S'
                    ],
                    [
                        'text' => 'A powerhouse of strategic intuition. They masterfully bridge the gap between local nuances and global excellence.',
                        'name' => 'Abdullah Al-Sudairy',
                        'role' => 'Founder, Al Mugheb Real Estate',
                        'initial' => 'A'
                    ]
                ];
            @endphp

            @foreach($testimonials as $t)
                <div class="h-full" data-aos="zoom-in">
                    <div class="group relative flex flex-col h-full p-12 rounded-[56px] glass-card border-black/[0.03] hover:bg-white/[0.04] transition-all duration-700 hover:-translate-y-2 overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-16 -mt-16 group-hover:bg-primary/10 transition-colors duration-700"></div>
                        <div class="mb-10 relative">
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star size-4 fill-primary text-primary shadow-[0_0_10px_rgba(0,135,206,0.3)]" aria-hidden="true"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                @endfor
                            </div>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote text-primary/20 size-20 absolute -top-10 -left-10 opacity-30 group-hover:opacity-100 group-hover:scale-110 transition-all duration-700" aria-hidden="true">
                                <path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                                <path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
                            </svg>

                            <p class="text-xl md:text-2xl text-foreground font-light leading-relaxed relative z-10 italic">
                                @if(app()->getLocale() == 'ar')
                                    &rdquo;{{ __($t['text']) }}&ldquo;
                                @else
                                    &ldquo;{{ __($t['text']) }}&rdquo;
                                @endif
                            </p>
                        </div>
                        
                        <div class="mt-auto flex items-center gap-6 pt-10 border-t border-black/[0.05]">
                            <div class="relative">
                                <div class="size-16 rounded-full bg-gradient-to-br from-primary/20 to-primary/5 flex items-center justify-center font-black text-primary text-2xl border border-primary/20 shadow-2xl group-hover:scale-110 transition-transform duration-700">
                                    {{ substr($t['initial'], 0, 1) }}
                                </div>
                                <div class="absolute -bottom-1 -right-1 size-5 rounded-full bg-primary flex items-center justify-center border-2 border-background">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star size-2.5 fill-background text-background" aria-hidden="true"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                </div>
                            </div>
                            <div>
                                <div class="font-black text-foreground text-xl tracking-tight leading-tight mb-1 group-hover:text-primary transition-colors duration-500">{{ __($t['name']) }}</div>
                                <div class="text-primary/60 text-xs font-black uppercase tracking-[0.2em]">{{ __($t['role']) }}</div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-primary/0 to-transparent group-hover:via-primary/40 transition-all duration-1000"></div>
                    </div>
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
