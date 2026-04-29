@extends('layouts.app')

@section('title', $page->getTranslation('title', app()->getLocale()))

@section('content')
<x-page-header 
    badge="{{ __('Digital Rhythm') }}"
    titleBottom="{{ $page->getTranslation('title', app()->getLocale()) }}"
/>

<div class="relative overflow-hidden bg-white">
    <main class="relative z-10 pb-24">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">

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
