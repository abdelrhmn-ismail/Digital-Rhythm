@php
    $siteTitle = __(\App\Helpers\SettingsHelper::siteTitle());
    $contactEmail = \App\Helpers\SettingsHelper::contactEmail();
    $contactPhone = \App\Helpers\SettingsHelper::contactPhone();
    $contactAddress = \App\Helpers\SettingsHelper::contactAddress();
    $socialLinks = \App\Helpers\SettingsHelper::socialLinks();
@endphp

<footer class="bg-background border-t border-black/10 relative overflow-hidden">
    <!-- Ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[300px] bg-primary/10 blur-[100px] rounded-[100%] pointer-events-none z-0"></div>

    <div class="container mx-auto px-6 py-20 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-12 lg:col-span-5">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-secondary/20 border border-primary/30 rounded-xl flex items-center justify-center">
                        <i class="fas fa-crown text-primary text-2xl"></i>
                    </div>
                    <span class="text-2xl font-black text-foreground uppercase tracking-wider">{{ $siteTitle }}</span>
                </div>
                <p class="text-muted mb-8 max-w-md font-light leading-relaxed text-lg">
                    {{ __('A creative powerhouse specialized in high-performance digital architectures and global-scale brand transformations.') }}
                </p>
                <div class="flex gap-4">
                    @if(!empty($socialLinks['facebook']) && $socialLinks['facebook'] !== '#')
                    <a href="{{ $socialLinks['facebook'] }}" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-foreground/70 hover:text-foreground hover:bg-primary hover:border-primary transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($socialLinks['twitter']) && $socialLinks['twitter'] !== '#')
                    <a href="{{ $socialLinks['twitter'] }}" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-foreground/70 hover:text-foreground hover:bg-primary hover:border-primary transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($socialLinks['linkedin']) && $socialLinks['linkedin'] !== '#')
                    <a href="{{ $socialLinks['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-foreground/70 hover:text-foreground hover:bg-primary hover:border-primary transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                    @endif
                    @if(!empty($socialLinks['instagram']) && $socialLinks['instagram'] !== '#')
                    <a href="{{ $socialLinks['instagram'] }}" target="_blank" rel="noopener noreferrer" class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-foreground/70 hover:text-foreground hover:bg-primary hover:border-primary transition-all duration-300 hover:-translate-y-1">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    @endif
                </div>
            </div>
            

            
            <!-- Agency -->
            <div class="col-span-1 md:col-span-4 lg:col-span-2">
                <h3 class="text-sm font-bold text-foreground mb-8 tracking-[0.2em] uppercase">{{ __('AGENCY') }}</h3>
                <ul class="space-y-4 font-light text-muted">
                    <li><a href="{{ route('about') ?? '#' }}" class="hover:text-primary transition-colors">{{ __('About Us') }}</a></li>
                    <li><a href="{{ route('services') ?? '#' }}" class="hover:text-primary transition-colors">{{ __('Our Services') }}</a></li>
                    <li><a href="{{ route('contact') ?? '#' }}" class="hover:text-primary transition-colors">{{ __('Careers') }}</a></li>
                    <li><a href="{{ route('contact') ?? '#' }}" class="hover:text-primary transition-colors">{{ __('Contact') }}</a></li>
                </ul>
            </div>
            
            <!-- Connect -->
            <div class="col-span-1 md:col-span-4 lg:col-span-3">
                <h3 class="text-sm font-bold text-foreground mb-8 tracking-[0.2em] uppercase">{{ __('CONNECT') }}</h3>
                <div class="space-y-6">
                    @if(!empty($contactEmail))
                    <a href="mailto:{{ $contactEmail }}" class="group flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-foreground transition-all duration-300">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span class="text-muted font-light group-hover:text-foreground transition-colors">{{ $contactEmail }}</span>
                    </a>
                    @endif
                    @if(!empty($contactPhone))
                    <a href="tel:{{ str_replace(' ', '', $contactPhone) }}" class="group flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-foreground transition-all duration-300">
                            <i class="fas fa-phone"></i>
                        </div>
                        <span class="text-muted font-light group-hover:text-foreground transition-colors">{{ $contactPhone }}</span>
                    </a>
                    @endif
                    @if(!empty($contactAddress))
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border border-black/10 flex items-center justify-center text-primary">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="text-muted font-light">{!! __($contactAddress) !!}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="border-t border-black/10 mt-16 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-foreground/60 text-sm font-light mb-4 md:mb-0">
                    &copy; {{ date('Y') }} {{ $siteTitle }}. {{ __('ALL RIGHTS RESERVED.') }}
                </p>
                <div class="flex gap-8 items-center">
                    <a href="{{ route('privacy') }}" class="text-foreground/60 hover:text-primary transition-colors text-sm font-light">{{ __('Privacy Policy') }}</a>
                    <a href="{{ route('terms') }}" class="text-foreground/60 hover:text-primary transition-colors text-sm font-light">{{ __('Terms of Service') }}</a>
                    <span class="text-zinc-600 text-xs font-light hidden md:inline">|</span>
                    <span class="text-zinc-600 text-xs font-light">{{ __('Live Systems') }}</span>
                </div>
            </div>
        </div>
    </div>
</footer>



