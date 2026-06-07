@props([
    'name',
    'value' => null,
    'label' => __('Upload Image'),
    'placeholder' => __('Click to Upload'),
    'hint' => __('PNG, JPG or SVG recommended'),
    'aspect' => 'aspect-video',
    'required' => false,
])

<div class="space-y-6" x-data="{ 
    hasImage: {{ $value ? 'true' : 'false' }},
    previewUrl: '{{ $value }}',
    init() {
        this.$watch('previewUrl', value => {
            this.hasImage = !!value;
        });
    }
}">
    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">
        <span class="material-icons text-sm">file_upload</span>
        {{ $label }}
    </h3>
    
    <div class="relative group {{ $aspect }} rounded-[32px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-8">
        <!-- Preview Container -->
        <div id="preview-container-{{ $name }}" 
             class="absolute inset-0 w-full h-full p-8 flex items-center justify-center bg-slate-900 z-20 pointer-events-none"
             style="background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px); background-size: 16px 16px;"
             x-show="hasImage"
             x-cloak>
            <img id="preview-logo-{{ $name }}" :src="previewUrl" alt="Preview" class="max-w-full max-h-full object-contain">
        </div>
        
        <!-- Upload Placeholder UI -->
        <div id="upload-placeholder-{{ $name }}" 
             class="flex flex-col items-center justify-center text-center z-10 transition-opacity duration-300"
             :class="hasImage ? 'opacity-0 group-hover:opacity-100' : ''">
            <span class="material-icons text-4xl text-primary/40 mb-2">image</span>
            <span class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] block">{{ $placeholder }}</span>
            <p class="text-[9px] text-gray-400 mt-1 italic">{{ $hint }}</p>
        </div>

        <!-- Real Input -->
        <input type="file" name="{{ $name }}" id="input-{{ $name }}" 
               accept="image/*"
               @if($required && !$value) required @endif
               @change="
                const file = $event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { previewUrl = e.target.result; };
                    reader.readAsDataURL(file);
                }
               "
               class="absolute inset-0 opacity-0 cursor-pointer z-30">
    </div>
    @error($name)
        <p class="text-red-500 text-[10px] mt-1 ml-1 font-bold italic">{{ $message }}</p>
    @enderror
</div>
