@extends('layouts.app')

@section('title', $page->getTranslation('title', app()->getLocale()))

@section('content')
<div class="relative min-h-screen overflow-hidden bg-white">
    <!-- Background Effects (Matching Home Page Hero) -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] bg-[radial-gradient(ellipse_at_center,_rgba(1,25,74,0.05)_0%,_transparent_60%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <main class="relative z-10 pt-48 pb-24">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-20" data-aos="fade-up">
                <!-- Decorative Badge -->
                <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-8 shadow-[0_0_20px_rgba(1,25,74,0.05)]">
                    <span class="tracking-[0.4em] uppercase text-[10px]">{{ __('Digital Rhythm') }}</span>
                </div>

                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-gray-900 tracking-tighter leading-tight mb-8" data-aos="fade-up" data-aos-delay="100">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                        {{ $page->getTranslation('title', app()->getLocale()) }}
                    </span>
                </h1>
                
                <div class="flex justify-center">
                    <div class="w-32 h-1.5 bg-primary rounded-full"></div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-white/50 backdrop-blur-sm rounded-[48px] p-8 md:p-16 border border-gray-100 shadow-2xl shadow-gray-200/50" data-aos="fade-up" data-aos-delay="100">
                <div class="prose prose-xl prose-slate max-w-none text-gray-600 font-light leading-relaxed prose-headings:text-gray-900 prose-headings:font-black prose-headings:tracking-tighter prose-headings:uppercase prose-a:text-primary prose-strong:text-gray-900 prose-strong:font-black">
                    {!! $page->getTranslation('content', app()->getLocale()) !!}
                </div>
            </div>

            <!-- Back to Home -->
            <div class="mt-16 text-center" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('home') }}" class="group inline-flex items-center gap-2 text-sm font-black uppercase tracking-widest text-gray-400 hover:text-primary transition-colors">
                    <span class="material-icons text-lg group-hover:-translate-x-1 transition-transform">arrow_back</span>
                    {{ __('Back to home') }}
                </a>
            </div>
        </div>
    </main>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</div>

<style>
    /* Custom prose overrides to ensure perfect matching */
    .prose h1, .prose h2, .prose h3 {
        margin-top: 2em;
        margin-bottom: 1em;
    }
    .prose p {
        margin-bottom: 1.5em;
    }
</style>
@endsection
