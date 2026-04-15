@props(['number', 'icon', 'title', 'description', 'link', 'delay' => '0'])

<div class="service-card relative group" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="flex justify-between items-start mb-12">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary/20 to-secondary/20 border border-primary/30 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="{{ $icon }} text-3xl text-primary"></i>
        </div>
        <div class="text-5xl font-black text-foreground/5 select-none">{{ $number }}</div>
    </div>
    
    <h3 class="text-3xl font-bold mb-4 text-foreground uppercase">{{ $title }}</h3>
    <p class="text-muted mb-10 leading-relaxed font-light text-lg">
        {{ $description }}
    </p>
    
    <div class="mt-auto pt-6 border-t border-black/10">
        <a href="{{ $link }}" class="inline-flex items-center text-primary font-bold tracking-widest uppercase text-sm hover:text-primary-400 transition-colors group-hover:translate-x-2 duration-300 transform">
            {{ __('DISCOVER MORE') }} <i class="fas fa-arrow-right ml-3 text-lg opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0 transition-all duration-300"></i>
        </a>
    </div>
</div>



