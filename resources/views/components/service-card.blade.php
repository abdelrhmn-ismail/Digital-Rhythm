@props(['service'])

<a href="{{ route('services') }}" {{ $attributes->merge(['class' => 'group relative flex flex-col p-8 rounded-3xl bg-white/[0.02] border border-black/[0.05] hover:border-primary/40 hover:bg-white/[0.04] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(0,135,206,0.1)]']) }}>
    <!-- Image/Icon -->
    <div class="mb-6 h-14">
        @if($service->image)
            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" 
                 class="w-14 h-14 rounded-2xl object-cover group-hover:scale-110 transition-all duration-500 shadow-sm border border-primary/10">
        @else
            <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 group-hover:scale-110 transition-all duration-500">
                <span class="material-icons text-primary text-3xl">{{ $service->icon ?? 'business_center' }}</span>
            </div>
        @endif
    </div>

    <!-- Title -->
    <h3 class="text-base font-bold text-foreground uppercase tracking-wide mb-4 group-hover:text-primary transition-colors duration-300 leading-tight">
        {{ $service->title }}
    </h3>

    <!-- Description -->
    <p class="text-muted font-light leading-relaxed text-sm mb-6 flex-grow">
        {!! $service->description !!}
    </p>

    <!-- Features (if available) -->
    @if($service->features && is_array($service->features))
    <ul class="space-y-2 mb-6">
        @foreach(array_slice($service->features, 0, 3) as $feature)
        <li class="flex items-start gap-2 text-xs text-muted font-light">
            <span class="material-icons text-primary text-sm mt-0.5">check_circle</span>
            <span>{{ $feature }}</span>
        </li>
        @endforeach
    </ul>
    @endif

    <!-- CTA -->
    <div class="flex items-center gap-2 text-primary font-bold uppercase text-xs tracking-widest group-hover:gap-3 transition-all duration-300">
        <span>{{ __('DISCOVER MORE') }}</span>
        <span class="material-icons text-sm">arrow_forward</span>
    </div>

    <!-- Hover glow effect -->
    <div class="absolute inset-0 rounded-3xl bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none blur-xl"></div>
</a>



