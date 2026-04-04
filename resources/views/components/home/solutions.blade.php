<section class="py-24 md:py-32 bg-[#050506] relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-[-20%] w-[150%] h-[300px] bg-gradient-to-r from-transparent via-primary/5 to-transparent blur-[120px] opacity-20"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto mb-20 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>OUR SOLUTIONS
            </div>
            <h2 class="text-5xl md:text-8xl font-black text-white mb-8 leading-tight tracking-tighter uppercase" data-aos="fade-up">
                WE ENGINEER <br/> <span class="text-gradient">GLOBAL IMPACT</span>
            </h2>
            <p class="text-lg md:text-2xl text-zinc-400 font-light leading-relaxed max-w-3xl" data-aos="fade-up">
                Bespoke strategic frameworks designed to propel your brand from local presence to global dominance with surgical precision.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up">
            @foreach($services as $index => $service)
            <div class="h-full" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <a class="group relative flex flex-col h-full p-10 rounded-[48px] bg-zinc-950/50 border border-white/[0.03] hover:bg-white/5 transition-all duration-700 overflow-hidden" href="/services/{{ $service->slug }}">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                    
                    <div class="flex justify-between items-start mb-12 relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-black shadow-[0_0_30px_rgba(245,158,11,0.2)] group-hover:scale-110 group-hover:shadow-[0_0_40px_rgba(245,158,11,0.5)] transition-all duration-700">
                             <span class="material-icons text-3xl">{{ $service->icon ?? 'settings' }}</span>
                        </div>
                        <span class="text-lg font-black text-white/5 group-hover:text-primary transition-colors duration-700 tracking-tighter">0{{ $index + 1 }}</span>
                    </div>

                    <div class="flex-grow relative z-10">
                        <h3 class="text-2xl font-black text-white mb-4 group-hover:text-primary transition-colors duration-500 uppercase">{{ $service->title }}</h3>
                        <p class="text-zinc-400 text-sm font-light leading-relaxed mb-10 group-hover:text-zinc-300 transition-colors duration-500">{{ $service->description }}</p>
                    </div>

                    <div class="flex items-center text-[10px] font-black uppercase tracking-[0.3em] text-primary mt-auto relative z-10">
                        <span class="border-b-2 border-primary/10 pb-1 group-hover:border-primary transition-all duration-500">DISCOVER MORE</span>
                        <span class="material-icons text-sm ml-2 transition-transform group-hover:translate-x-2">arrow_forward</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="mt-24 flex justify-center" data-aos="fade-up">
            <a class="inline-flex items-center justify-center gap-6 bg-zinc-950 text-white hover:bg-zinc-900 border border-white/10 px-16 h-20 rounded-full font-black text-sm uppercase tracking-[0.3em] transition-all hover:scale-105 active:scale-95 group shadow-2xl backdrop-blur-3xl relative z-10" href="/services">
                EXPLORE ALL ARCHITECTURES
                <span class="material-icons size-5 group-hover:translate-x-2 transition-transform duration-500">arrow_forward</span>
            </a>
        </div>
    </div>
</section>