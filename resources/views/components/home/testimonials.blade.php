<section class="py-32 bg-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-primary/5 via-white to-white z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        <x-section-header 
            badge="{{ __('TESTIMONIALS') }}"
            title="{{ __('THE VOICE OF') }} <br/> <span class='bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary'>{{ __('GLOBAL TRUST') }}</span>"
            subtitle="{{ __('We engineer growth for those who dare to define the future. Their success is our only metric.') }}"
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $testimonial)
            <div class="group relative flex flex-col h-full p-10 rounded-[48px] bg-white border border-gray-200 hover:bg-gray-50 hover:shadow-xl transition-all duration-700 overflow-hidden"
                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="mb-10 text-primary">
                    @for($i = 0; $i < floor($testimonial->rating); $i++)
                        <span class="material-icons text-sm">star</span>
                    @endfor
                    @if($testimonial->rating - floor($testimonial->rating) > 0)
                        <span class="material-icons text-sm">star_half</span>
                    @endif
                </div>

                <div class="flex-grow">
                    <div class="text-xl text-gray-600 font-light italic leading-relaxed mb-12">{!! $testimonial->content !!}</div>
                </div>

                <div class="flex items-center gap-4 mt-auto">

                    <div>
                        <h4 class="font-black text-gray-900 uppercase text-sm tracking-widest">{{ $testimonial->name }}</h4>
                        <p class="text-primary text-[10px] font-black uppercase tracking-widest">{{ $testimonial->position }} <span class="text-gray-400">•</span> {{ $testimonial->company }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



