@extends('layouts.app')

@section('title', __('Contact Us | Golden Bee'))
@section('description', __('Get in touch with Golden Bee Marketing.'))

@section('content')
<!-- Hero Section -->
<section class="pt-40 pb-20 bg-[#050506] relative overflow-hidden text-center">
    <div class="container mx-auto px-6 relative z-10" data-aos="fade-up">
        <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-8">
            <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">{{ __('START THE CLOCK') }}</span>
        </div>
        <h1 class="text-6xl md:text-[80px] lg:text-[100px] font-black leading-[0.9] uppercase mb-8">
            <span class="text-white block">{{ __('INITIATE') }}</span>
            <span class="text-gradient block">{{ __('CONTACT') }}</span>
        </h1>
        <p class="text-xl text-zinc-400 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('Ready to completely dominate your market? Secure a consultation with our architects today.') }}
        </p>
    </div>
</section>

<!-- Form & Info -->
<section class="py-20 bg-[#050506] relative">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            <!-- Left Info -->
            <div class="lg:col-span-4" data-aos="fade-right">
                <h3 class="text-4xl font-black text-white uppercase mb-10">{{ __('Headquarters') }}</h3>
                
                <div class="space-y-12">
                    <div class="flex items-start space-x-6">
                        <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center border border-white/10 text-amber-500 shadow-[0_0_20px_rgba(245,158,11,0.1)]">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold tracking-widest uppercase text-white/80 mb-2">{{ __('Location') }}</h4>
                            <p class="text-zinc-400 font-light text-lg">{{ __('Riyadh, Saudi Arabia') }}<br>{{ __('King Fahd Road, 4th Floor') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-6">
                        <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center border border-white/10 text-amber-500 shadow-[0_0_20px_rgba(245,158,11,0.1)]">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold tracking-widest uppercase text-white/80 mb-2">{{ __('Email Access') }}</h4>
                            <a href="mailto:info@goldenbee.sa" class="text-zinc-400 hover:text-amber-500 transition-colors font-light text-lg">info@goldenbee.sa</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-6">
                        <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center border border-white/10 text-amber-500 shadow-[0_0_20px_rgba(245,158,11,0.1)]">
                            <i class="fas fa-phone text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold tracking-widest uppercase text-white/80 mb-2">{{ __('Direct Line') }}</h4>
                            <a href="tel:+966558781218" class="text-zinc-400 hover:text-amber-500 transition-colors font-light text-lg">+966 55 878 1218</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Form -->
            <div class="lg:col-span-8" data-aos="fade-left">
                <div class="bg-white/[0.02] border border-white/10 backdrop-blur-xl rounded-[48px] p-12 lg:p-16">
                    <form action="#" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs font-bold tracking-[0.2em] uppercase text-zinc-500">{{ __('Full Name') }}</label>
                                <input type="text" name="name" class="w-full bg-transparent border-b border-white/20 px-0 py-4 text-white focus:outline-none focus:border-amber-500 transition-colors text-lg font-light placeholder:text-zinc-700" placeholder="{{ __('John Doe') }}">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold tracking-[0.2em] uppercase text-zinc-500">{{ __('Email Address') }}</label>
                                <input type="email" name="email" class="w-full bg-transparent border-b border-white/20 px-0 py-4 text-white focus:outline-none focus:border-amber-500 transition-colors text-lg font-light placeholder:text-zinc-700" placeholder="{{ __('john@company.com') }}">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-xs font-bold tracking-[0.2em] uppercase text-zinc-500">{{ __('Company Name') }}</label>
                            <input type="text" name="company" class="w-full bg-transparent border-b border-white/20 px-0 py-4 text-white focus:outline-none focus:border-amber-500 transition-colors text-lg font-light placeholder:text-zinc-700" placeholder="{{ __('Your Enterprise') }}">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-xs font-bold tracking-[0.2em] uppercase text-zinc-500">{{ __('Project Details') }}</label>
                            <textarea name="message" rows="4" class="w-full bg-transparent border-b border-white/20 px-0 py-4 text-white focus:outline-none focus:border-amber-500 transition-colors text-lg font-light resize-none placeholder:text-zinc-700" placeholder="{{ __('Tell us about your objectives...') }}"></textarea>
                        </div>
                        
                        <div class="pt-8">
                            <button type="submit" class="btn-primary w-full md:w-auto">
                                {{ __('SUBMIT INQUIRY') }} <i class="fas fa-paper-plane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
