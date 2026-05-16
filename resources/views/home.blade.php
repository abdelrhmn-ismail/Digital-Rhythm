@extends('layouts.app')

@section('title', $siteTitle . ' | ' . __('Global Creative Agency'))

@section('content')
<main class="flex-grow">
    <x-page-header 
        minHeight="min-h-screen"
        badge="{{ __('Global Marketing Agency') }}"
        titleTop="{{ __('TRANSLATE YOUR') }}"
        titleBottom="{{ __('VISION') }}"
        subtitle="{{ __('Your premier creative partner specializing in digital dominance, bespoke branding, and global scale.') }}"
    >
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center pt-8">
            <!-- Primary CTA -->
            <a class="group relative inline-flex items-center justify-center gap-3 min-w-[280px] bg-primary hover:bg-primary/90 text-white font-black px-12 h-16 rounded-full text-lg shadow-[0_4px_20px_rgba(1,25,74,0.25)] hover:shadow-[0_8px_30px_rgba(1,25,74,0.4)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden"
               href="{{ route('contact') }}">
                <span class="relative z-10">{{ __('Start Now / Book a Free Consultation') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>

            <!-- Secondary CTA -->
            <a class="group inline-flex items-center justify-center gap-3 min-w-[280px] border border-gray-300 bg-white hover:bg-gray-50 hover:border-primary/40 text-gray-900 font-bold px-12 h-16 rounded-full text-lg backdrop-blur-sm transition-all duration-300 hover:scale-105 active:scale-95"
               href="{{ route('services') }}">
                <span>{{ __('Explore Our Services') }}</span>
                <span class="material-icons text-xl group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </x-page-header>
    <x-home.why-choose-us />
    <x-home.impact />

    <x-home.cta />
</main>
@endsection




