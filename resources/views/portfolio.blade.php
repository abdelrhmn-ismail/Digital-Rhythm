@extends('layouts.app')

@section('title', __('Portfolio | Golden Bee'))
@section('description', __('View our global impact projects.'))

@section('content')
<!-- Hero Section -->
<section class="pt-40 pb-20 bg-[#050506] relative overflow-hidden text-center border-b border-white/5">
    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8">
            <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">{{ __('THE ARCHIVES') }}</span>
        </div>
        <h1 class="text-6xl md:text-[80px] lg:text-[100px] font-black leading-[0.9] uppercase mb-8">
            <span class="text-white block">{{ __('FEATURED') }}</span>
            <span class="text-gradient block">{{ __('PROJECTS') }}</span>
        </h1>
        <p class="text-xl text-zinc-400 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __("Proof of execution. Explore the brands we've redefined globally.") }}
        </p>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-32 bg-[#050506]">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach($portfolios as $index => $portfolio)
                <div class="group cursor-pointer {{ $index % 2 != 0 ? 'md:mt-24' : '' }}" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="w-full h-[500px] bg-white/5 rounded-[48px] border border-white/10 mb-8 overflow-hidden relative flex items-center justify-center">
                        @if($portfolio->thumbnail)
                            <img src="{{ $portfolio->thumbnail_url }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        @if(!$portfolio->thumbnail)
                            <i class="fas fa-image text-8xl text-white/10 group-hover:scale-110 transition-transform duration-700"></i>
                        @endif
                    </div>
                    <div class="px-4">
                        <div class="text-amber-500 text-sm font-bold tracking-widest uppercase mb-3">{{ $portfolio->category }}</div>
                        <h3 class="text-4xl font-black text-white uppercase mb-4 group-hover:text-amber-400 transition-colors">{{ $portfolio->title }}</h3>
                        <p class="text-zinc-500 font-light text-lg">{{ $portfolio->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<x-home.cta />
@endsection
