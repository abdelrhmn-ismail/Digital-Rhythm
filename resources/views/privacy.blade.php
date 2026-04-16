@extends('layouts.app')

@section('title', __('Privacy Policy') . ' | ' . $siteTitle)
@section('description', __('Privacy Policy for') . ' ' . $siteTitle . '.')

@section('content')
<section class="pt-32 pb-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-black mb-8 text-gray-900 leading-tight tracking-tighter">{{ __('Privacy Policy') }}</h1>
            <p class="text-gray-600 mb-8 font-light">{{ __('Last updated:') }} {{ date('F j, Y') }}</p>
            
            <div class="space-y-12">
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">security</span>
                        {{ __('Information We Collect') }}
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed font-light">
                        {{ __('We collect information you provide directly to us, such as when you fill out a contact form, subscribe to our newsletter, or engage with our services. This may include:') }}
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Name and contact information') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Company details') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Project requirements and preferences') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Communication preferences') }}
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">how_to_reg</span>
                        {{ __('How We Use Your Information') }}
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed font-light">
                        {{ __('We use the information we collect to provide, maintain, and improve our services, including:') }}
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Responding to your inquiries and requests') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Providing our services and support') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Sending you marketing communications (with your consent)') }}
                        </li>
                        <li class="flex items-center gap-3 text-gray-600 font-light">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                            {{ __('Analyzing and improving our services') }}
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">share</span>
                        {{ __('Information Sharing') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __('We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this privacy policy.') }}
                    </p>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 md:p-12 hover:shadow-lg transition-all duration-300">
                    <h2 class="text-2xl font-black mb-6 text-primary flex items-center gap-3">
                        <span class="material-icons">admin_panel_settings</span>
                        {{ __('Data Security') }}
                    </h2>
                    <p class="text-gray-600 leading-relaxed font-light">
                        {{ __('We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.') }}
                    </p>
                </div>
                
                <div class="bg-primary/5 border border-primary/10 rounded-3xl p-8 md:p-12 text-center">
                    <h2 class="text-2xl font-black mb-6 text-gray-900 flex items-center justify-center gap-3">
                        <span class="material-icons text-primary">contact_support</span>
                        {{ __('Contact Us') }}
                    </h2>
                    <p class="text-gray-600 mb-8 leading-relaxed font-light">
                        {{ __('If you have any questions about this Privacy Policy, please contact us at:') }}
                    </p>
                    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
                        <div class="flex items-center gap-3">
                            <span class="material-icons text-primary">email</span>
                            <a href="mailto:info@digitalrhythm.sa" class="text-lg font-bold text-gray-900 hover:text-primary transition-colors">info@digitalrhythm.sa</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-icons text-primary">phone</span>
                            <a href="tel:+966558781218" class="text-lg font-bold text-gray-900 hover:text-primary transition-colors">+966 55 878 1218</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



