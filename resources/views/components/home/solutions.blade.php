<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-[-20%] w-[150%] h-[300px] bg-gradient-to-r from-transparent via-primary/5 to-transparent blur-[120px] opacity-20"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto mb-20 text-center flex flex-col items-center">
            <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>{{ __('OUR SOLUTIONS') }}
            </div>
            <h2 class="text-5xl md:text-8xl font-black text-gray-900 mb-8 leading-tight tracking-tighter uppercase" data-aos="fade-up">
                {{ __('WE ENGINEER') }} <br/> <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('GLOBAL IMPACT') }}</span>
            </h2>
            <p class="text-lg md:text-2xl text-gray-600 font-light leading-relaxed max-w-3xl" data-aos="fade-up">
                {{ __('Bespoke strategic frameworks designed to propel your brand from local presence to global dominance with surgical precision.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up">
            @foreach($services as $index => $service)
            <div class="h-full" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <a class="group relative flex flex-col h-full p-10 rounded-[48px] bg-white border border-gray-200 hover:bg-gray-50 hover:border-primary/30 hover:shadow-xl transition-all duration-700 overflow-hidden" href="/services/{{ $service->slug }}">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>

                    <div class="flex justify-between items-start mb-12 relative z-10">
                        <div class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-white shadow-[0_4px_15px_rgba(1,25,74,0.2)] group-hover:scale-110 group-hover:shadow-[0_8px_25px_rgba(1,25,74,0.3)] transition-all duration-700">
                             <span class="material-icons text-3xl">{{ $service->icon ?? 'settings' }}</span>
                        </div>
                        <span class="text-lg font-black text-gray-300 group-hover:text-primary transition-colors duration-700 tracking-tighter">0{{ $index + 1 }}</span>
                    </div>

                    <div class="flex-grow relative z-10">
                        <h3 class="text-2xl font-black text-gray-900 mb-4 group-hover:text-primary transition-colors duration-500 uppercase">{{ $service->title }}</h3>
                        <p class="text-gray-600 text-sm font-light leading-relaxed mb-10 group-hover:text-gray-700 transition-colors duration-500">{{ $service->description }}</p>
                    </div>

                    <div class="flex items-center text-[10px] font-black uppercase tracking-[0.3em] text-primary mt-auto relative z-10">
                        <span class="border-b-2 border-primary/10 pb-1 group-hover:border-primary transition-all duration-500">{{ __('DISCOVER MORE') }}</span>
                        <span class="material-icons text-sm ml-2 transition-transform group-hover:translate-x-2">arrow_forward</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="mt-24 flex justify-center" data-aos="fade-up">
            <a class="inline-flex items-center justify-center gap-6 bg-primary text-white hover:bg-primary/90 px-16 h-20 rounded-full font-black text-sm uppercase tracking-[0.3em] transition-all hover:scale-105 active:scale-95 group shadow-[0_4px_20px_rgba(1,25,74,0.25)] hover:shadow-[0_8px_30px_rgba(1,25,74,0.4)] relative z-10" href="{{ route('services') }}">
                {{ __('EXPLORE ALL ARCHITECTURES') }}
                <span class="material-icons size-5 group-hover:translate-x-2 transition-transform duration-500">arrow_forward</span>
            </a>
        </div>
    </div>
</section>