<section class="jsx-2ab8fd2717b41d19 py-16 bg-white overflow-hidden relative">
    <div class="jsx-2ab8fd2717b41d19 absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] bg-primary/5 blur-[150px] rounded-[100%] pointer-events-none"></div>
    <div class="jsx-2ab8fd2717b41d19 max-w-7xl mx-auto px-6 mb-10 text-center relative z-10">
        <div class="jsx-2ab8fd2717b41d19 inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-5">
            <span class="jsx-2ab8fd2717b41d19 w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ __('CREATIVE WORKS SHOWCASE') }}
        </div>
        <h2 class="jsx-2ab8fd2717b41d19 text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 tracking-tighter">
            {{ __('BEHIND THE') }} <span class="jsx-2ab8fd2717b41d19 bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('MAGIC') }}</span>
        </h2>
    </div>
    <div dir="ltr" class="jsx-2ab8fd2717b41d19 w-full relative z-10">
        <div class="jsx-2ab8fd2717b41d19 relative w-full overflow-hidden h-[280px] sm:h-[340px] md:h-[420px] lg:h-[480px]">
            <div class="jsx-2ab8fd2717b41d19 marquee-track h-full">
                {{-- Triple the loop to ensure seamless infinite marquee even with few items --}}
                @foreach($portfolios->concat($portfolios)->concat($portfolios) as $portfolio)
                <div class="jsx-2ab8fd2717b41d19 marquee-card h-full rounded-[16px] md:rounded-[24px] overflow-hidden bg-white border border-gray-200 shadow-lg group relative">
                    <img src="{{ $portfolio->thumbnail_url }}" alt="{{ $portfolio->title }}" loading="lazy" class="jsx-2ab8fd2717b41d19 h-full w-auto max-w-none object-cover transition-transform duration-700 group-hover:scale-110"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-white/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                        <span class="text-primary text-[10px] font-bold tracking-widest uppercase mb-2">{{ $portfolio->category }}</span>
                        <h4 class="text-gray-900 font-black text-xl leading-tight">{{ $portfolio->title }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="jsx-2ab8fd2717b41d19 pointer-events-none absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-white to-transparent z-20"></div>
            <div class="jsx-2ab8fd2717b41d19 pointer-events-none absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-white to-transparent z-20"></div>
        </div>
    </div>
</section>