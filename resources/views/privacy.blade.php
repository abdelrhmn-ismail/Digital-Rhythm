@extends('layouts.app')

@section('title', __('Privacy Policy | Golden Bee Marketing'))
@section('description', __('Privacy Policy for Golden Bee Marketing. Learn how we collect, use, and protect your personal information.'))

@section('content')
<section class="pt-32 pb-20 bg-gradient-to-b from-dark to-darker">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 text-gradient">{{ __('Privacy Policy') }}</h1>
            <p class="text-gray-300 mb-8">{{ __('Last updated:') }} {{ date('F j, Y') }}</p>
            
            <div class="prose prose-invert max-w-none">
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">{{ __('Information We Collect') }}</h2>
                    <p class="text-gray-300 mb-4">
                        {{ __('We collect information you provide directly to us, such as when you fill out a contact form, subscribe to our newsletter, or engage with our services. This may include:') }}
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2">
                        <li>{{ __('Name and contact information') }}</li>
                        <li>{{ __('Company details') }}</li>
                        <li>{{ __('Project requirements and preferences') }}</li>
                        <li>{{ __('Communication preferences') }}</li>
                    </ul>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">{{ __('How We Use Your Information') }}</h2>
                    <p class="text-gray-300 mb-4">
                        {{ __('We use the information we collect to provide, maintain, and improve our services, including:') }}
                    </p>
                    <ul class="list-disc list-inside text-gray-300 space-y-2">
                        <li>{{ __('Responding to your inquiries and requests') }}</li>
                        <li>{{ __('Providing our services and support') }}</li>
                        <li>{{ __('Sending you marketing communications (with your consent)') }}</li>
                        <li>{{ __('Analyzing and improving our services') }}</li>
                    </ul>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">{{ __('Information Sharing') }}</h2>
                    <p class="text-gray-300 mb-4">
                        {{ __('We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this privacy policy.') }}
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">{{ __('Data Security') }}</h2>
                    <p class="text-gray-300 mb-4">
                        {{ __('We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.') }}
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">{{ __('Contact Us') }}</h2>
                    <p class="text-gray-300 mb-4">
                        {{ __('If you have any questions about this Privacy Policy, please contact us at:') }}
                    </p>
                    <p class="text-gray-300">
                        {{ __('Email:') }} <a href="mailto:info@goldenbee.sa" class="text-yellow-400 hover:text-yellow-300">info@goldenbee.sa</a><br>
                        {{ __('Phone:') }} <a href="tel:+966558781218" class="text-yellow-400 hover:text-yellow-300">+966 55 878 1218</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
