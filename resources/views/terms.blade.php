@extends('layouts.app')

@section('title', __('Terms of Service') . ' | ' . $siteTitle)
@section('description', __('Terms of Service for') . ' ' . $siteTitle . '.')

@section('content')
<section class="pt-32 pb-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-black mb-8 text-gray-900 leading-tight tracking-tighter">{{ __('Terms of Service') }}</h1>
            <p class="text-gray-600 mb-8 font-light">{{ __('Last updated:') }} {{ date('F j, Y') }}</p>
            
            <div class="space-y-12">
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">gavel</span>
                        {{ __('Agreement to Terms') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __("By accessing and using") }} {{ $siteTitle }}{{ __("'s services, you accept and agree to be bound by the terms and provision of this agreement.") }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">design_services</span>
                        {{ __('Services') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ $siteTitle }} {{ __('provides digital marketing, web development, creative production, and brand identity services. Specific deliverables and timelines will be outlined in project proposals.') }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">payments</span>
                        {{ __('Payment Terms') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __('Payment terms vary by project scope and will be detailed in your project agreement. Generally, we require a deposit before work begins, with milestone payments throughout the project.') }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">assignment_ind</span>
                        {{ __('Client Responsibilities') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __('Clients are responsible for providing timely feedback, necessary content and materials, and accurate information to ensure project success.') }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">copyright</span>
                        {{ __('Intellectual Property') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __('Upon full payment, clients receive full rights to deliverables.') }} {{ $siteTitle }} {{ __('retains the right to showcase completed work in our portfolio.') }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">warning</span>
                        {{ __('Limitation of Liability') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ $siteTitle }} {{ __('shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our services.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



