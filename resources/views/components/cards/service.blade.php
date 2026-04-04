@props(['number', 'icon', 'title', 'description', 'link', 'delay' => '0'])

<div class="service-card relative group" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="flex justify-between items-start mb-12">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500/20 to-amber-700/20 border border-amber-500/30 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="{{ $icon }} text-3xl text-amber-500"></i>
        </div>
        <div class="text-5xl font-black text-white/5 select-none">{{ $number }}</div>
    </div>
    
    <h3 class="text-3xl font-bold mb-4 text-white uppercase">{{ $title }}</h3>
    <p class="text-zinc-400 mb-10 leading-relaxed font-light text-lg">
        {{ $description }}
    </p>
    
    <div class="mt-auto pt-6 border-t border-white/10">
        <a href="{{ $link }}" class="inline-flex items-center text-amber-500 font-bold tracking-widest uppercase text-sm hover:text-amber-400 transition-colors group-hover:translate-x-2 duration-300 transform">
            DISCOVER MORE <i class="fas fa-arrow-right ml-3 text-lg opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0 transition-all duration-300"></i>
        </a>
    </div>
</div>
