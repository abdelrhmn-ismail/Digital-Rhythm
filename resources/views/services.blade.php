@extends('layouts.app')

@section('title', __('Our Services | Golden Bee'))
@section('description', __('Explore our comprehensive digital solutions.'))

@section('content')
<!-- ============================================
     SECTION 1: HERO
     ============================================ -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Effects -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Radial gradient glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[600px] bg-[radial-gradient(ellipse_at_center,_rgba(0,135,206,0.12)_0%,_transparent_60%)]"></div>
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_70%)]"></div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 pt-32 pb-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-sm font-bold text-primary mb-4 shadow-[0_0_20px_rgba(0,135,206,0.1)] hover:border-primary/40 transition-all duration-300" 
                 data-aos="fade-down" 
                 data-aos-delay="200">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span class="tracking-[0.2em] uppercase text-[10px] md:text-xs">{{ __('OUR EXPERTISE') }}</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-4xl xs:text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 tracking-tighter leading-[0.85]" 
                data-aos="fade-up" 
                data-aos-delay="300">
                <span class="text-gray-900 block mb-2">{{ __('CREATIVE') }}</span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary block relative inline-block">
                    {{ __('SOLUTIONS') }}
                    <!-- Shimmer overlay -->
                    <span class="absolute inset-0 bg-[linear-gradient(90deg,_transparent_0%,_rgba(255,255,255,0.3)_50%,_transparent_100%)] bg-[length:200%_100%] animate-[shimmer_3s_linear_infinite] pointer-events-none"></span>
                </span>
            </h1>

            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light" 
               data-aos="fade-up" 
               data-aos-delay="400">
                {{ __('We don\'t just offer services. We engineer holistic strategies designed to secure your brand\'s future in the digital era.') }}
            </p>
        </div>
    </div>

    <!-- Bottom fade effect -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
</section>

<!-- ============================================
     SECTION 2: SERVICE CATEGORIES
     ============================================ -->
<section class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    <div class="absolute top-1/3 right-0 w-[400px] h-[400px] bg-primary/5 blur-[160px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        
        <!-- Category 1: Branding & Identity -->
        <div class="mb-32 last:mb-0" data-aos="fade-up">
            <!-- Category Header -->
            <div class="flex items-center gap-4 mb-12">
                <div class="text-6xl md:text-8xl font-black text-gray-200">01</div>
                <div class="h-px flex-1 bg-gradient-to-r from-primary/30 to-transparent"></div>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">
                {{ __('BRANDING & IDENTITY') }}
            </h2>
            <p class="text-lg text-gray-600 font-light mb-12 max-w-3xl">
                {{ __('Building distinctive visual identities that resonate with your audience and define your market presence.') }}
            </p>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Logo Design -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">brush</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Logo Design') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Innovative logo designs that reflect your brand identity.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Identity Design -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">palette</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Identity Design') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Building a comprehensive visual identity that leaves a lasting impression.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Profile Design -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">description</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Profile Design') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Professional profile designs that highlight your company capabilities.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Packaging Design -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">inventory_2</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Packaging Design') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Attractive packaging designs that enhance the customer experience.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category 2: Digital Marketing -->
        <div class="mb-32 last:mb-0" data-aos="fade-up">
            <!-- Category Header -->
            <div class="flex items-center gap-4 mb-12">
                <div class="text-6xl md:text-8xl font-black text-gray-200">02</div>
                <div class="h-px flex-1 bg-gradient-to-r from-primary/30 to-transparent"></div>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">
                {{ __('DIGITAL MARKETING') }}
            </h2>
            <p class="text-lg text-gray-600 font-light mb-12 max-w-3xl">
                {{ __('Data-driven marketing campaigns that maximize reach, engagement, and conversions.') }}
            </p>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Social Media Management -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">share</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Social Media Management') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Professional management of social media platforms to enhance your digital presence.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Paid Marketing Campaigns -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">campaign</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Paid Marketing Campaigns') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Targeted advertising campaigns to increase sales and reach.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Professional Graphic Design -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">graphic_eq</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Professional Graphic Design') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Creative designs that support your marketing goals.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- E-Commerce Management -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">shopping_cart</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('E-Commerce Management') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Comprehensive management of your online store to ensure optimal performance.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category 3: Web Design & Development -->
        <div class="mb-32 last:mb-0" data-aos="fade-up">
            <!-- Category Header -->
            <div class="flex items-center gap-4 mb-12">
                <div class="text-6xl md:text-8xl font-black text-gray-200">03</div>
                <div class="h-px flex-1 bg-gradient-to-r from-primary/30 to-transparent"></div>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">
                {{ __('WEB DESIGN & DEVELOPMENT') }}
            </h2>
            <p class="text-lg text-gray-600 font-light mb-12 max-w-3xl">
                {{ __('High-performance websites that blend aesthetics with seamless functionality.') }}
            </p>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Custom Websites -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">web</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Custom Websites') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Design and development of custom websites that fit your unique project needs.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- CMS Websites -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">dashboard</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('CMS Websites') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Easy-to-manage websites that give you full control over your content.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- E-Commerce Websites -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">store</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('E-Commerce Websites') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Complete e-commerce solutions to increase your online sales.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category 4: Production & Events Services -->
        <div data-aos="fade-up">
            <!-- Category Header -->
            <div class="flex items-center gap-4 mb-12">
                <div class="text-6xl md:text-8xl font-black text-gray-200">04</div>
                <div class="h-px flex-1 bg-gradient-to-r from-primary/30 to-transparent"></div>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4 uppercase tracking-tight">
                {{ __('PRODUCTION & EVENTS') }}
            </h2>
            <p class="text-lg text-gray-600 font-light mb-12 max-w-3xl">
                {{ __('Professional photography, videography, and event coverage that captures every moment.') }}
            </p>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Photography -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">camera_alt</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Product Photography') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Professional photography of your products that highlights their details and appeal.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Drone Photography -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">flight</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Drone Photography') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Enchanting aerial shots that give your project a new and distinct perspective.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Event Photography -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">event</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Event Photography') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Integrated coverage of your events to document every moment of success.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Short Advertising Videos -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-200 hover:border-primary/30 hover:bg-white hover:shadow-lg transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-6">
                        <span class="material-icons text-4xl text-primary">videocam</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wide">
                        {{ __('Short Advertising Videos') }}
                    </h3>
                    <p class="text-gray-600 font-light leading-relaxed text-sm mb-6">
                        {{ __('Short and impactful videos that increase your audience engagement with your brand.') }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest hover:gap-3 transition-all duration-300">
                        {{ __('EXPLORE SOLUTION') }}
                        <span class="material-icons text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECTION 3: CTA
     ============================================ -->
<section class="py-32 md:py-40 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50/50 to-white"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 blur-[200px] rounded-full"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <!-- Badge -->
        <div class="inline-flex items-center gap-3 px-6 py-2 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-xl text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-8" data-aos="zoom-in">
            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
            {{ __('CUSTOM SOLUTIONS FOR BOLD GOALS') }}
        </div>

        <!-- Headline -->
        <h2 class="text-5xl md:text-8xl lg:text-9xl font-black text-gray-900 mb-8 leading-[0.85] tracking-tighter" data-aos="fade-up" data-aos-delay="100">
            {{ __('READY TO') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('DOMINATE?') }}</span>
        </h2>

        <!-- Description -->
        <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-12 font-light leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            {{ __("Let's engineer your custom strategy and unlock your brand\'s full potential.") }}
        </p>

        <!-- CTA Button -->
        <div data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('contact') }}" 
               class="group relative inline-flex items-center justify-center gap-3 min-w-[300px] bg-primary hover:bg-primary/90 text-primary-foreground font-black px-14 h-18 rounded-full text-lg shadow-[0_0_30px_rgba(0,135,206,0.3)] hover:shadow-[0_0_50px_rgba(0,135,206,0.5)] transition-all duration-300 hover:scale-105 active:scale-95 overflow-hidden">
                <span class="relative z-10">{{ __('Get Free Strategy Call') }}</span>
                <span class="material-icons text-xl relative z-10 group-hover:translate-x-1 transition-transform">phone_in_talk</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>
</section>
@endsection
