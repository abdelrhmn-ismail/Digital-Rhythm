@extends('layouts.app')

@section('title', 'Terms of Service | Golden Bee Marketing')
@section('description', 'Terms of Service for Golden Bee Marketing. Read our terms and conditions for using our services.')

@section('content')
<section class="pt-32 pb-20 bg-gradient-to-b from-dark to-darker">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-8 text-gradient">Terms of Service</h1>
            <p class="text-gray-300 mb-8">Last updated: {{ date('F j, Y') }}</p>
            
            <div class="prose prose-invert max-w-none">
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Agreement to Terms</h2>
                    <p class="text-gray-300">
                        By accessing and using Golden Bee Marketing's services, you accept and agree to be bound by the terms and provision of this agreement.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Services</h2>
                    <p class="text-gray-300 mb-4">
                        Golden Bee Marketing provides digital marketing, web development, creative production, and brand identity services. Specific deliverables and timelines will be outlined in project proposals.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Payment Terms</h2>
                    <p class="text-gray-300 mb-4">
                        Payment terms vary by project scope and will be detailed in your project agreement. Generally, we require a deposit before work begins, with milestone payments throughout the project.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Client Responsibilities</h2>
                    <p class="text-gray-300 mb-4">
                        Clients are responsible for providing timely feedback, necessary content and materials, and accurate information to ensure project success.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Intellectual Property</h2>
                    <p class="text-gray-300 mb-4">
                        Upon full payment, clients receive full rights to deliverables. Golden Bee Marketing retains the right to showcase completed work in our portfolio.
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-dark to-darker border border-gray-800 rounded-xl p-8">
                    <h2 class="text-2xl font-bold mb-4 text-gradient">Limitation of Liability</h2>
                    <p class="text-gray-300 mb-4">
                        Golden Bee Marketing shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our services.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
