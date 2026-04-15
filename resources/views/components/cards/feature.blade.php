@props(['icon', 'title', 'description', 'delay' => '0'])

<div class="glass-card rounded-[40px] p-8 group hover:-translate-y-2 transition-all duration-500 hover:border-primary/30" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="w-20 h-20 bg-background/5 border border-black/10 rounded-[24px] flex items-center justify-center mb-8 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-[0_0_20px_rgba(255,255,255,0.05)] group-hover:shadow-[0_0_30px_rgba(0,135,206,0.2)]">
        <i class="{{ $icon }} text-primary text-3xl"></i>
    </div>
    <h3 class="text-2xl font-bold mb-4 text-foreground uppercase tracking-wide">{{ $title }}</h3>
    <p class="text-muted group-hover:text-gray-600 transition-colors duration-300 font-light leading-relaxed">
        {{ $description }}
    </p>
</div>



