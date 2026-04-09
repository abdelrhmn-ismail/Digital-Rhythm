@props(['testimonial'])

<div {{ $attributes->merge(['class' => 'bg-white/[0.02] border border-white/[0.05] rounded-3xl p-8 hover:border-primary/30 transition-all duration-500 hover:bg-white/[0.04]']) }}>
    <!-- Stars -->
    <div class="flex gap-1 mb-6">
        @for($i = 1; $i <= 5; $i++)
        <span class="material-icons text-primary text-2xl">
            @if($i <= ($testimonial->rating ?? 5))
                star
            @else
                star_border
            @endif
        </span>
        @endfor
    </div>

    <!-- Testimonial Content -->
    <p class="text-zinc-300 font-light leading-relaxed mb-6 text-sm">
        "{{ $testimonial->content }}"
    </p>

    <!-- Author Info -->
    <div class="flex items-center gap-4 pt-6 border-t border-white/[0.05]">
        @if($testimonial->client_image)
        <img src="{{ asset('storage/testimonials/' . $testimonial->client_image) }}" 
             alt="{{ $testimonial->client }}"
             class="w-12 h-12 rounded-full object-cover border-2 border-primary/30">
        @else
        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center border-2 border-primary/30">
            <span class="material-icons text-primary text-xl">person</span>
        </div>
        @endif
        
        <div class="flex-1">
            <h4 class="text-white font-bold text-sm">{{ $testimonial->client }}</h4>
            @if($testimonial->position || $testimonial->company)
            <p class="text-zinc-500 text-xs font-light">
                {{ $testimonial->position }}@if($testimonial->position && $testimonial->company) · @endif{{ $testimonial->company }}
            </p>
            @endif
        </div>
    </div>
</div>
