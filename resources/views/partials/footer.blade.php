<footer class="bg-[#050506] border-t border-white/10 relative overflow-hidden">
    <!-- Ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-amber-600/10 blur-[100px] rounded-[100%] pointer-events-none z-0"></div>

    <div class="container mx-auto px-6 py-20 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-12 lg:col-span-5">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500/20 to-amber-700/20 border border-amber-500/30 rounded-xl flex items-center justify-center">
                        <i class="fas fa-crown text-amber-500 text-2xl"></i>
                    </div>
                    <span class="text-2xl font-black text-white uppercase tracking-wider">Golden<span class="font-light">Bee</span></span>
                </div>
                <p class="text-zinc-400 mb-8 max-w-md font-light leading-relaxed text-lg">
                    {{ __('A creative powerhouse specialized in high-performance digital architectures and global-scale brand transformations.') }}
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-white/70 hover:text-white hover:bg-amber-500 hover:border-amber-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-white/70 hover:text-white hover:bg-amber-500 hover:border-amber-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-white/70 hover:text-white hover:bg-amber-500 hover:border-amber-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-white/70 hover:text-white hover:bg-amber-500 hover:border-amber-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>
            
            <!-- Services -->
            <div class="col-span-1 md:col-span-4 lg:col-span-2">
                <h3 class="text-sm font-bold text-white mb-8 tracking-[0.2em] uppercase">{{ __('Services') }}</h3>
                <ul class="space-y-4 font-light text-zinc-400">
                    <li><a href="{{ route('services') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Digital Marketing') }}</a></li>
                    <li><a href="{{ route('services') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Web Development') }}</a></li>
                    <li><a href="{{ route('services') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Media Production') }}</a></li>
                    <li><a href="{{ route('services') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Brand Identity') }}</a></li>
                </ul>
            </div>
            
            <!-- Agency -->
            <div class="col-span-1 md:col-span-4 lg:col-span-2">
                <h3 class="text-sm font-bold text-white mb-8 tracking-[0.2em] uppercase">{{ __('AGENCY') }}</h3>
                <ul class="space-y-4 font-light text-zinc-400">
                    <li><a href="{{ route('about') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('About Us') }}</a></li>
                    <li><a href="{{ route('portfolio') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Our Projects') }}</a></li>
                    <li><a href="{{ route('contact') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Careers') }}</a></li>
                    <li><a href="{{ route('contact') ?? '#' }}" class="hover:text-amber-500 transition-colors">{{ __('Contact') }}</a></li>
                </ul>
            </div>
            
            <!-- Connect -->
            <div class="col-span-1 md:col-span-4 lg:col-span-3">
                <h3 class="text-sm font-bold text-white mb-8 tracking-[0.2em] uppercase">{{ __('CONNECT') }}</h3>
                <div class="space-y-6">
                    <a href="mailto:info@goldenbee.sa" class="group flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-amber-500 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span class="text-zinc-400 font-light group-hover:text-white transition-colors">info@goldenbee.sa</span>
                    </a>
                    <a href="tel:+966558781218" class="group flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-amber-500 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                            <i class="fas fa-phone"></i>
                        </div>
                        <span class="text-zinc-400 font-light group-hover:text-white transition-colors">+966 55 878 1218</span>
                    </a>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-amber-500">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="text-zinc-400 font-light">{{ __('Riyadh, Saudi Arabia') }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-white/10 mt-16 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-zinc-500 text-sm font-light mb-4 md:mb-0">
                    &copy; {{ date('Y') }} {{ __('Golden Bee Marketing. All rights reserved.') }}
                </p>
                <div class="flex space-x-8">
                    <a href="#" class="text-zinc-500 hover:text-amber-500 transition-colors text-sm font-light">{{ __('Privacy Policy') }}</a>
                    <a href="#" class="text-zinc-500 hover:text-amber-500 transition-colors text-sm font-light">{{ __('Terms of Service') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
