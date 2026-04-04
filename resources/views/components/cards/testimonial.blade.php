@props(['quote', 'name', 'location', 'delay' => '0'])

<div class="testimonial-card flex flex-col" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="flex text-amber-500 mb-8 space-x-1 text-sm">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </div>
    
    <p class="text-white mb-10 text-[22px] leading-relaxed font-light flex-grow">
        "{{ $quote }}"
    </p>
    
    <div class="flex items-center pt-8 border-t border-white/10">
        <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-700 rounded-full mr-5 shadow-lg flex items-center justify-center font-black text-white text-xl">
            {{ substr($name, 0, 1) }}
        </div>
        <div>
            <div class="font-bold text-white tracking-wide uppercase text-sm mb-1">{{ $name }}</div>
            <div class="text-zinc-500 text-xs font-semibold uppercase tracking-widest">{{ $location }}</div>
        </div>
    </div>
</div>
