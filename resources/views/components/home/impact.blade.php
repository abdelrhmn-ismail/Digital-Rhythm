<section class="py-32 bg-[#050506] relative">
    <div class="container mx-auto px-6 relative z-10">
        <div class="mb-20 flex flex-col items-center text-center" data-aos="fade-up">
            <div class="inline-block py-1 px-4 rounded-full border border-white/10 bg-white/5 backdrop-blur-md mb-6">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-white/80">{{ __('WHAT WE DO') }}</span>
            </div>
            <h2 class="text-[56px] md:text-[72px] font-black leading-[1] uppercase mb-8">
                <span class="text-white block">{{ __('WE ENGINEER') }}</span>
                <span class="text-gradient block">{{ __('GLOBAL IMPACT') }}</span>
            </h2>
            <p class="text-xl text-zinc-400 max-w-3xl font-light" data-aos="fade-up" data-aos-delay="200">
                {{ __('Bespoke strategic frameworks designed to propel your brand from local presence to global dominance with surgical precision.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Digital Marketing -->
            <x-cards.service 
                number="01" 
                icon="fas fa-bullhorn" 
                :title="__('Digital Marketing')" 
                :description="__('Accelerating your growth through data-driven strategic campaigns and tangible results.')"
                link="{{ route('services') ?? '#' }}" 
                delay="100" />
            
            <!-- Web Solutions -->
            <x-cards.service 
                number="02" 
                icon="fas fa-code" 
                :title="__('Web Solutions')" 
                :description="__('Designing and developing ultra-fast websites that blend aesthetics with seamless functionality.')"
                link="{{ route('services') ?? '#' }}" 
                delay="200" />
            
            <!-- Creative Production -->
            <x-cards.service 
                number="03" 
                icon="fas fa-video" 
                :title="__('Creative Production')" 
                :description="__('Creating eye-catching visual content that professionally tells your success story.')"
                link="{{ route('services') ?? '#' }}" 
                delay="300" />
            
            <!-- Brand Identity -->
            <x-cards.service 
                number="04" 
                icon="fas fa-palette" 
                :title="__('Brand Identity')" 
                :description="__('Crafting unique visual identities that resonate with your audience and define your market presence.')"
                link="{{ route('services') ?? '#' }}" 
                delay="400" />
        </div>
    </div>
</section>
