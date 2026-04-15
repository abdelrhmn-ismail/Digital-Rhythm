@props(['quote', 'name', 'location', 'delay' => '0'])

<div class="testimonial-card flex flex-col" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="flex text-primary mb-8 space-x-1 text-sm">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </div>
    
    <p class="text-foreground mb-10 text-[22px] leading-relaxed font-light flex-grow">
        "{{ $quote }}"
    </p>
    
    <div class="flex items-center pt-8 border-t border-black/10">
        <div class="w-14 h-14 bg-gradient-to-br from-primary to-secondary rounded-full mr-5 shadow-lg flex items-center justify-center font-black text-foreground text-xl">
            {{ substr($name, 0, 1) }}
        </div>
        <div>
            <div class="font-bold text-foreground tracking-wide uppercase text-sm mb-1">{{ $name }}</div>
            <div class="text-foreground/60 text-xs font-semibold uppercase tracking-widest">{{ $location }}</div>
        </div>
    </div>
</div>



