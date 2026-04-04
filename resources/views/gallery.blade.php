@extends('layouts.app')

@section('title', 'Gallery | Creative Works Showcase')

@section('content')
<div class="pt-32 pb-20 bg-[#050506]">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="mb-16 text-center" data-aos="fade-up">
            <div class="inline-block py-1 px-4 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-md mb-6">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">Our Masterpieces</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase leading-tight mb-8">
                Creative <span class="text-gradient">Gallery</span>
            </h1>
            <p class="text-xl text-zinc-400 max-w-2xl mx-auto font-light">
                Explore our curated collection of digital experiences, brand identities, and creative productions that define the future of marketing.
            </p>
        </div>

        <!-- Filter Categories (Static for now) -->
        <div class="flex flex-wrap justify-center gap-4 mb-16" data-aos="fade-up" data-aos-delay="100">
            <button class="px-6 py-2 rounded-full border border-primary bg-primary text-black font-bold text-sm transition-all hover:scale-105">All Works</button>
            <button class="px-6 py-2 rounded-full border border-white/10 bg-white/5 text-white/60 font-bold text-sm transition-all hover:border-primary/40 hover:text-white hover:scale-105">Digital Marketing</button>
            <button class="px-6 py-2 rounded-full border border-white/10 bg-white/5 text-white/60 font-bold text-sm transition-all hover:border-primary/40 hover:text-white hover:scale-105">Web Solutions</button>
            <button class="px-6 py-2 rounded-full border border-white/10 bg-white/5 text-white/60 font-bold text-sm transition-all hover:border-primary/40 hover:text-white hover:scale-105">Creative Production</button>
            <button class="px-6 py-2 rounded-full border border-white/10 bg-white/5 text-white/60 font-bold text-sm transition-all hover:border-primary/40 hover:text-white hover:scale-105">Brand Identity</button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $galleryItems = [
                    ['title' => 'Digital Brand Evolution', 'category' => 'Branding', 'image' => 'https://goldenbee.sa/uploads/d8e49609-dd6c-4a7d-b18a-6f8f923c3144.webp'],
                    ['title' => 'Interactive UI/UX', 'category' => 'Web Solutions', 'image' => 'https://goldenbee.sa/uploads/643bbeae-21e8-48dc-87e2-caeae6d82a93.gif'],
                    ['title' => 'Cinematic Commercial', 'category' => 'Production', 'image' => 'https://goldenbee.sa/uploads/b4d5bb60-eddc-45e2-b328-ae6ceea0a22a.gif'],
                    ['title' => 'Strategic Growth Campaign', 'category' => 'Marketing', 'image' => 'https://goldenbee.sa/uploads/4f1019cb-4c96-4265-a14e-7a82bd543af4.webp'],
                    ['title' => 'Minimalist Identity', 'category' => 'Branding', 'image' => 'https://goldenbee.sa/uploads/0d7c4434-caea-49e5-bd38-4799e0cd9321.webp'],
                    ['title' => 'E-Commerce Platform', 'category' => 'Web Solutions', 'image' => 'https://goldenbee.sa/uploads/0ec7031e-1978-4fd1-bb91-514aef5ddf5f.webp'],
                ];
            @endphp

            @foreach($galleryItems as $index => $item)
            <div class="group relative overflow-hidden rounded-3xl aspect-[4/5] bg-zinc-900 border border-white/5 shadow-2xl" 
                 data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-70 group-hover:opacity-100">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                
                <div class="absolute inset-x-8 bottom-8 transition-transform duration-500 transform translate-y-4 group-hover:translate-y-0">
                    <span class="text-primary text-xs font-black uppercase tracking-widest mb-2 block">{{ $item['category'] }}</span>
                    <h3 class="text-2xl font-bold text-white mb-4 leading-tight">{{ $item['title'] }}</h3>
                    <a href="#" class="inline-flex items-center gap-2 text-white text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        View Project <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="mt-32 p-12 rounded-[40px] bg-gradient-to-br from-primary/20 to-transparent border border-white/10 text-center relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 blur-[100px] -z-10"></div>
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6 uppercase">Ready to create your <span class="text-gradient">masterpiece?</span></h2>
            <p class="text-lg text-zinc-300 mb-10 max-w-2xl mx-auto font-light">Join the elite brands that have transformed their vision into global impact with Golden Bee.</p>
            <a href="/contact" class="inline-flex items-center gap-3 bg-primary text-black px-10 py-4 rounded-full font-black text-lg transition-all hover:scale-105 hover:shadow-[0_0_30px_rgba(245,158,11,0.5)]">
                Start A Project <span class="material-icons">rocket_launch</span>
            </a>
        </div>
    </div>
</div>
@endsection
