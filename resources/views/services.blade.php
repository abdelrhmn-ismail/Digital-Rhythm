@extends('layouts.app')

@section('title', __('Our Services | Golden Bee'))
@section('description', __('Explore our comprehensive digital solutions.'))

@section('content')
<!-- Hero Section -->
<section class="pt-40 pb-20 bg-[#050506] relative overflow-hidden text-center">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-900/20 via-[#050506] to-[#050506] z-0"></div>

    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8">
            <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">{{ __('OUR CAPABILITIES') }}</span>
        </div>
        <h1 class="text-6xl md:text-[80px] lg:text-[100px] font-black leading-[0.9] uppercase mb-8">
            <span class="text-white block">{{ __('STRATEGIC') }}</span>
            <span class="text-gradient block">{{ __('ARCHITECTURES') }}</span>
        </h1>
        <p class="text-xl text-zinc-400 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __('High-performance systems built to scale. Discover how we construct market dominance step by step.') }}
        </p>
    </div>
</section>

<!-- Content Grid -->
<section class="py-20 bg-[#050506] relative">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            @foreach($services as $index => $service)
                <x-cards.service 
                    :number="str_pad($index + 1, 2, '0', STR_PAD_LEFT)" 
                    :icon="$service->icon ?: 'fas fa-arrow-right'" 
                    :title="$service->title" 
                    :description="$service->description" 
                    :link="route('services', ['slug' => $service->slug])" 
                    :delay="($index + 1) * 100" 
                />
            @endforeach
        </div>
    </div>
</section>

<x-home.cta />
@endsection
