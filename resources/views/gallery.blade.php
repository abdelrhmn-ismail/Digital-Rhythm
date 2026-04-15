@extends('layouts.app')

@section('title', __('Gallery | Creative Works Showcase'))

@section('content')
<div class="pt-32 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="mb-16 text-center" data-aos="fade-up">
            <div class="inline-block py-1 px-4 rounded-full border border-primary/20 bg-primary/5 backdrop-blur-md mb-6">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-gray-700">{{ __('Our Masterpieces') }}</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 uppercase leading-tight mb-8">
                {{ __('Creative') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('Gallery') }}</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">
                {{ __('Explore our curated collection of digital experiences, brand identities, and creative productions that define the future of marketing.') }}
            </p>
        </div>

        <!-- Filter Categories -->
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-4 mb-16" data-aos="fade-up" data-aos-delay="100">
            <button data-category="all" 
                    class="gallery-filter px-6 py-2 rounded-full border border-primary bg-primary text-black font-bold text-sm transition-all hover:scale-105 active">
                {{ __('All Works') }}
            </button>
            @foreach($categories as $category)
            <button data-category="{{ $category }}" 
                    class="gallery-filter px-6 py-2 rounded-full border border-gray-200 bg-gray-50 text-gray-600 font-bold text-sm transition-all hover:border-primary/40 hover:text-gray-900 hover:scale-105">
                {{ $category }}
            </button>
            @endforeach
        </div>
        @endif

        <!-- Gallery Grid -->
        @if($galleryImages->count() > 0)
        <div class="gallery-grid columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            @foreach($galleryImages as $index => $image)
            <div class="gallery-item group relative overflow-hidden rounded-3xl bg-white border border-gray-200 shadow-xl break-inside-avoid cursor-pointer"
                 data-category="{{ $image->category }}"
                 data-aos="zoom-in" 
                 data-aos-delay="{{ $index % 10 * 50 }}"
                 onclick="openLightbox({{ $index }})">
                
                <!-- Image -->
                <img src="{{ $image->image_url }}" 
                     alt="{{ $image->title ?? __('Gallery Image') }}"
                     class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>

                <!-- Content Overlay -->
                <div class="absolute inset-x-6 bottom-6 transition-transform duration-500 transform translate-y-4 group-hover:translate-y-0">
                    @if($image->category)
                    <span class="text-primary text-xs font-black uppercase tracking-widest mb-2 block">{{ $image->category }}</span>
                    @endif
                    
                    @if($image->title)
                    <h3 class="text-xl font-bold text-white mb-2 leading-tight">{{ $image->title }}</h3>
                    @endif
                    
                    @if($image->caption)
                    <p class="text-gray-600 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-300 line-clamp-2">{{ $image->caption }}</p>
                    @endif

                    <!-- View Icon -->
                    <div class="mt-4 flex items-center gap-2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="material-icons text-2xl">zoom_in</span>
                        <span class="text-sm font-bold">{{ __('View') }}</span>
                    </div>
                </div>

                <!-- Featured Badge -->
                @if($image->is_featured)
                <div class="absolute top-4 right-4">
                    <span class="flex items-center gap-1 bg-primary/90 text-black text-xs font-bold px-3 py-1 rounded-full">
                        <span class="material-icons text-sm">auto_awesome</span>
                        {{ __('Featured') }}
                    </span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-20" data-aos="fade-up">
            <span class="material-icons text-8xl text-zinc-700 mb-4">photo_library</span>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('Gallery Coming Soon') }}</h3>
            <p class="text-gray-600">{{ __('We are curating our creative masterpieces. Check back soon!') }}</p>
        </div>
        @endif

        <!-- CTA Section -->
        <div class="mt-32 p-12 rounded-[40px] bg-gradient-to-br from-primary/10 to-transparent border border-gray-200 text-center relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 blur-[100px] -z-10"></div>
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 uppercase">{{ __('Ready to create your') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ __('masterpiece?') }}</span></h2>
            <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto font-light">{{ __('Join the elite brands that have transformed their vision into global impact with Golden Bee.') }}</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 bg-primary text-black px-10 py-4 rounded-full font-black text-lg transition-all hover:scale-105 hover:shadow-[0_0_30px_rgba(0,135,206,0.5)]">
                {{ __('Start A Project') }} <span class="material-icons">rocket_launch</span>
            </a>
        </div>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-[9999] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/95 backdrop-blur-sm" onclick="closeLightbox()"></div>
    
    <!-- Close Button -->
    <button onclick="closeLightbox()" 
            class="absolute top-6 right-6 z-10 p-3 bg-white/10 hover:bg-white/30 rounded-full transition-colors">
        <span class="material-icons text-white text-3xl">close</span>
    </button>

    <!-- Navigation Buttons -->
    @if($galleryImages->count() > 1)
    <button onclick="prevImage()" 
            class="absolute left-6 top-1/2 -translate-y-1/2 z-10 p-3 bg-white/10 hover:bg-white/30 rounded-full transition-colors">
        <span class="material-icons text-white text-3xl">chevron_left</span>
    </button>
    
    <button onclick="nextImage()" 
            class="absolute right-6 top-1/2 -translate-y-1/2 z-10 p-3 bg-white/10 hover:bg-white/30 rounded-full transition-colors">
        <span class="material-icons text-white text-3xl">chevron_right</span>
    </button>
    @endif

    <!-- Image Container -->
    <div class="absolute inset-0 flex items-center justify-center p-8 md:p-16">
        <div class="max-w-6xl max-h-full">
            <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-2xl shadow-2xl">
            
            <!-- Image Info -->
            <div id="lightbox-info" class="mt-6 text-center">
                <h3 id="lightbox-title" class="text-2xl font-bold text-white mb-2"></h3>
                <p id="lightbox-caption" class="text-gray-400 font-light"></p>
                <div id="lightbox-category" class="text-primary text-sm font-bold uppercase tracking-widest mt-2"></div>
                <div class="text-gray-400 text-sm mt-2">
                    <span id="lightbox-counter">1</span> / <span id="lightbox-total">{{ $galleryImages->count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
const galleryImagesData = @json($galleryImages->map(function($img) {
    return [
        'url' => $img->image_url,
        'title' => $img->title ?? '',
        'caption' => $img->caption ?? '',
        'category' => $img->category ?? ''
    ];
})->values());

let currentIndex = 0;

function openLightbox(index) {
    currentIndex = index;
    updateLightbox();
    document.getElementById('lightbox').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = '';
}

function updateLightbox() {
    const image = galleryImagesData[currentIndex];
    document.getElementById('lightbox-image').src = image.url;
    document.getElementById('lightbox-image').alt = image.title;
    document.getElementById('lightbox-title').textContent = image.title;
    document.getElementById('lightbox-caption').textContent = image.caption;
    document.getElementById('lightbox-category').textContent = image.category;
    document.getElementById('lightbox-counter').textContent = currentIndex + 1;
}

function nextImage() {
    currentIndex = (currentIndex + 1) % galleryImagesData.length;
    updateLightbox();
}

function prevImage() {
    currentIndex = (currentIndex - 1 + galleryImagesData.length) % galleryImagesData.length;
    updateLightbox();
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (document.getElementById('lightbox').classList.contains('hidden')) return;
    
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') nextImage();
    if (e.key === 'ArrowLeft') prevImage();
});

// Category filtering
document.querySelectorAll('.gallery-filter').forEach(button => {
    button.addEventListener('click', function() {
        const category = this.dataset.category;
        
        // Update active button
        document.querySelectorAll('.gallery-filter').forEach(btn => {
            btn.classList.remove('active', 'bg-primary', 'text-black', 'border-primary');
            btn.classList.add('bg-gray-50', 'text-gray-600', 'border-gray-200');
        });
        this.classList.add('active', 'bg-primary', 'text-black', 'border-primary');
        this.classList.remove('bg-gray-50', 'text-gray-600', 'border-gray-200');
        
        // Filter images
        document.querySelectorAll('.gallery-item').forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => item.style.opacity = '1', 10);
            } else {
                item.style.opacity = '0';
                setTimeout(() => item.style.display = 'none', 300);
            }
        });
    });
});
</script>
@endpush

@push('styles')
<style>
.bg-clip-text text-transparent bg-gradient-primary {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.gallery-item {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.gallery-filter.active {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
    color: #000;
    border-color: var(--color-primary);
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush

@endsection
