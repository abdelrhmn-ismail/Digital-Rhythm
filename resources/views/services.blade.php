@extends('layouts.app')

@section('title', 'Our Services | Golden Bee')
@section('description', 'Explore our comprehensive digital solutions.')

@section('content')
<!-- Hero Section -->
<section class="pt-40 pb-20 bg-[#050506] relative overflow-hidden text-center">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-900/20 via-[#050506] to-[#050506] z-0"></div>

    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8">
            <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">OUR CAPABILITIES</span>
        </div>
        <h1 class="text-6xl md:text-[80px] lg:text-[100px] font-black leading-[0.9] uppercase mb-8">
            <span class="text-white block">STRATEGIC</span>
            <span class="text-gradient block">ARCHITECTURES</span>
        </h1>
        <p class="text-xl text-zinc-400 max-w-3xl mx-auto font-light leading-relaxed">
            High-performance systems built to scale. Discover how we construct market dominance step by step.
        </p>
    </div>
</section>

<!-- Content Grid -->
<section class="py-20 bg-[#050506] relative">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <x-cards.service number="01" icon="fas fa-bullhorn" title="Digital Marketing" description="Hyper-targeted advertising frameworks, SEO domination, and data-driven scaling strategies." link="#" delay="100" />
            <x-cards.service number="02" icon="fas fa-code" title="Web Solutions" description="Enterprise-grade application architecture, headless commerce, and frictionless UI/UX." link="#" delay="200" />
            <x-cards.service number="03" icon="fas fa-video" title="Media Production" description="Cinematic visual storytelling, 3D motion graphics, and viral short-form content." link="#" delay="300" />
            <x-cards.service number="04" icon="fas fa-palette" title="Brand Identity" description="Psychology-backed visual identities, strict guideline systems, and corporate rebranding." link="#" delay="400" />
            <x-cards.service number="05" icon="fas fa-search-dollar" title="Performance SEO" description="Dominating search engines through aggressive link-building and technical on-page mastery." link="#" delay="500" />
            <x-cards.service number="06" icon="fas fa-hashtag" title="Social Management" description="Cultivating massive audiences globally through culturally relevant strategic community management." link="#" delay="600" />
        </div>
    </div>
</section>

<x-home.cta />
@endsection
