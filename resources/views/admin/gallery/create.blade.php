@extends('admin.layouts.app')

@section('title', __('Add Gallery Image'))

@section('content')
<div x-data="{ tab: 'en' }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.gallery.index') }}" class="hover:text-primary/70 transition-colors">{{ __('GALLERY') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('NEW IMAGE') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Upload Asset') }}</h1>
        </div>
        
        <div class="flex items-center gap-3 bg-white p-1.5 rounded-2xl shadow-sm border border-gray-100">
            <button @click="tab = 'en'" :class="tab === 'en' ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-gray-400 hover:text-gray-600'" class="px-5 py-2 rounded-xl text-xs font-black uppercase tracking-widest transition-all">
                English
            </button>
            <button @click="tab = 'ar'" :class="tab === 'ar' ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-gray-400 hover:text-gray-600'" class="px-5 py-2 rounded-xl text-xs font-black uppercase tracking-widest transition-all font-alexandria">
                العربية
            </button>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Content Card -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                    
                    <div class="space-y-8">
                        <!-- English Content -->
                        <div x-show="tab === 'en'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                            <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6 font-alexandria">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('English Details') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Image Title') }}</label>
                                    <input type="text" name="title[en]" value="{{ old('title.en') }}" 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner" placeholder="Enter title in English">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Image Caption') }}</label>
                                    <textarea name="caption[en]" class="tinymce h-32">{{ old('caption.en') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Content -->
                        <div x-show="tab === 'ar'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" dir="rtl">
                            <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6 font-alexandria">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('تفاصيل اللغة العربية') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('عنوان الصورة') }}</label>
                                    <input type="text" name="title[ar]" value="{{ old('title.ar') }}" 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner text-right font-alexandria" placeholder="اكتب العنوان بالعربية">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('وصف الصورة') }}</label>
                                    <textarea name="caption[ar]" class="tinymce h-32 text-right font-alexandria">{{ old('caption.ar') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visual Asset -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">
                        <span class="material-icons text-sm">file_upload</span>
                        {{ __('Upload Image') }}
                    </h3>
                    
                    <div class="relative group aspect-video rounded-[32px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-4">
                        <img id="preview-image" src="" alt="Preview" class="absolute inset-0 w-full h-full object-contain hidden">
                        <div id="upload-placeholder" class="flex flex-col items-center justify-center text-center">
                            <span class="material-icons text-4xl text-gray-200 mb-2">add_a_photo</span>
                            <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest block">{{ __('Click to Upload Asset') }}</span>
                            <p class="text-[9px] text-gray-300 mt-1 italic">{{ __('Max size: 5MB') }}</p>
                        </div>
                        <input type="file" name="image" required onchange="previewFile(event)" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>
            </div>

            <!-- Sidebar Controls (Others) -->
            <div class="space-y-8">
                <!-- Grouped Under "Others" -->
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Other Settings') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1 text-alexandria">{{ __('Category') }}</label>
                            <select name="category" class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold appearance-none cursor-pointer">
                                <option value="">{{ __('Select Category') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1 text-alexandria">{{ __('Search Tags') }}</label>
                            <input type="text" name="tags" value="{{ old('tags') }}" placeholder="e.g. nature, photography, agency"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1 text-alexandria">{{ __('Display Order') }}</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Final Actions -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Deploy Asset') }}
                    </button>
                    <a href="{{ route('admin.gallery.index') }}" class="w-full py-4 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Discard & Return') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewFile(event) {
    const output = document.getElementById('preview-image');
    const placeholder = document.getElementById('upload-placeholder');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.classList.remove('hidden');
    placeholder.classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '.tinymce',
        menubar: false,
        plugins: 'link lists autolink code',
        toolbar: 'bold italic | bullist numlist | link | removeformat | code',
        skin: 'oxide',
        content_css: 'default',
        height: 200,
        branding: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
});
</script>
@endsection


