<section class="py-32 bg-[#050506] relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-amber-900/10 via-[#050506] to-[#050506] z-0"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="mb-20 flex flex-col items-center text-center" data-aos="fade-up">
            <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-6">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">{{ __('TESTIMONIALS') }}</span>
            </div>
            <h2 class="text-[56px] md:text-[72px] font-black leading-[1] uppercase mb-8">
                <span class="text-white block">{{ __('THE VOICE OF') }}</span>
                <span class="text-gradient block">{{ __('GLOBAL TRUST') }}</span>
            </h2>
            <p class="text-xl text-zinc-400 max-w-3xl font-light" data-aos="fade-up" data-aos-delay="200">
                {{ __('We engineer growth for those who dare to define the future. Their success is our only metric.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testimonial)
            <div class="group relative flex flex-col h-full p-10 rounded-[48px] bg-zinc-950/50 border border-white/[0.03] hover:bg-white/5 transition-all duration-700 overflow-hidden" 
                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="mb-10 text-primary">
                    @for($i = 0; $i < floor($testimonial->rating); $i++)
                        <span class="material-icons text-sm">star</span>
                    @endfor
                    @if($testimonial->rating - floor($testimonial->rating) > 0)
                        <span class="material-icons text-sm">star_half</span>
                    @endif
                </div>

                <div class="flex-grow">
                    <p class="text-xl text-zinc-300 font-light italic leading-relaxed mb-12">"{{ $testimonial->content }}"</p>
                </div>

                <div class="flex items-center gap-4 mt-auto">
                    <div class="w-12 h-12 rounded-full border-2 border-primary/20 bg-primary/10 overflow-hidden">
                        <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : 'https://ui-avatars.com/api/?name=' . urlencode($testimonial->name) . '&background=f58d0a&color=fff' }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-black text-white uppercase text-sm tracking-widest">{{ $testimonial->name }}</h4>
                        <p class="text-primary text-[10px] font-black uppercase tracking-widest">{{ $testimonial->position }} <span class="text-zinc-500">•</span> {{ $testimonial->company }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
