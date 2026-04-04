@extends('layouts.app')

@section('title', 'About Us | Golden Bee')
@section('description', 'Learn about Golden Bee Marketing Agency - Your partner in digital dominance.')

@section('content')
<!-- Hero Section -->
<section class="pt-40 pb-20 bg-[#050506] relative overflow-hidden text-center">
    <!-- Ambient glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-amber-600/10 rounded-full blur-[120px] pointer-events-none z-0"></div>

    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8">
            <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">WHO WE ARE</span>
        </div>
        <h1 class="text-6xl md:text-[80px] lg:text-[100px] font-black leading-[0.9] uppercase mb-8">
            <span class="text-white block">WE ARE</span>
            <span class="text-gradient block">GOLDEN BEE</span>
        </h1>
        <p class="text-xl text-zinc-400 max-w-3xl mx-auto font-light leading-relaxed">
            We are architects of digital transformation. A collective of visionaries, strategists, and creators dedicated to forging global market leaders.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-[#050506] relative">
    <div class="container mx-auto px-6 max-w-5xl text-center">
        <h2 class="text-4xl font-bold text-white mb-10" data-aos="fade-up">Engineering Brands Since 2018</h2>
        <div class="space-y-8 text-lg font-light text-zinc-400 leading-relaxed text-left" data-aos="fade-up" data-aos-delay="200">
            <p>At Golden Bee, we don’t just execute marketing—we engineer comprehensive growth ecosystems. Our methodology is rooted in an aggressive pursuit of perfection, merging cutting-edge data science with unparalleled creative intuition.</p>
            <p>From Riyadh to the world, our specialized teams operate as an extension of your brand, dissecting market gaps and deploying surgical strategies that ensure your digital footprint is impossible to ignore.</p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-32 border-t border-white/10 relative bg-white/[0.02]">
    <div class="container mx-auto px-6 text-center">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div data-aos="zoom-in" data-aos-delay="100">
                <div class="text-[80px] font-black text-transparent bg-clip-text bg-gradient-to-br from-amber-400 to-amber-700 leading-none mb-4">50+</div>
                <div class="text-zinc-400 font-bold tracking-[0.2em] uppercase text-sm">Global Clients</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <div class="text-[80px] font-black text-transparent bg-clip-text bg-gradient-to-br from-amber-400 to-amber-700 leading-none mb-4">5M+</div>
                <div class="text-zinc-400 font-bold tracking-[0.2em] uppercase text-sm">Leads Gen</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <div class="text-[80px] font-black text-transparent bg-clip-text bg-gradient-to-br from-amber-400 to-amber-700 leading-none mb-4">12</div>
                <div class="text-zinc-400 font-bold tracking-[0.2em] uppercase text-sm">Awards Won</div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="400">
                <div class="text-[80px] font-black text-transparent bg-clip-text bg-gradient-to-br from-amber-400 to-amber-700 leading-none mb-4">100%</div>
                <div class="text-zinc-400 font-bold tracking-[0.2em] uppercase text-sm">Commitment</div>
            </div>
        </div>
    </div>
</section>

<x-home.cta />
@endsection
