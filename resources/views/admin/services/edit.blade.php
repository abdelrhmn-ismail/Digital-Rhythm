@extends('admin.layouts.app')

@section('title', __('Edit Service') . ': ' . $service->getTranslation('title', 'en'))

@section('content')
<div x-data="{ tab: 'en' }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.services.index') }}" class="hover:text-primary/70 transition-colors">{{ __('SERVICES') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('EDIT') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Edit Service') }}</h1>
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

    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Content Card -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                    
                    <div class="space-y-8">
                        <!-- English Content -->
                        <div x-show="tab === 'en'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                            <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('English Details') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Title') }}</label>
                                    <input type="text" name="title[en]" value="{{ old('title.en', $service->getTranslation('title', 'en')) }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Brief Description') }}</label>
                                    <textarea name="description[en]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner">{{ old('description.en', $service->getTranslation('description', 'en')) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Detailed Content') }}</label>
                                    <textarea name="content[en]" class="tinymce h-64">{{ old('content.en', $service->getTranslation('content', 'en')) }}</textarea>
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('العنوان') }}</label>
                                    <input type="text" name="title[ar]" value="{{ old('title.ar', $service->getTranslation('title', 'ar')) }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner text-right font-alexandria">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('وصف مختصر') }}</label>
                                    <textarea name="description[ar]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner text-right font-alexandria">{{ old('description.ar', $service->getTranslation('description', 'ar')) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('المحتوى التفصيلي') }}</label>
                                    <textarea name="content[ar]" class="tinymce h-64 text-right font-alexandria">{{ old('content.ar', $service->getTranslation('content', 'ar')) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-8 ml-1">
                        <span class="material-icons text-sm">auto_awesome</span>
                        {{ __('Dynamic Features List') }}
                    </h3>
                    
                    <div id="features-container" class="space-y-4">
                        @php
                            $enFeatures = old('features.en', $service->getTranslation('features', 'en') ?? []);
                            $arFeatures = old('features.ar', $service->getTranslation('features', 'ar') ?? []);
                            $count = max(count($enFeatures), count($arFeatures), 1);
                        @endphp
                        
                        @for($i = 0; $i < $count; $i++)
                            <div class="feature-item flex flex-col md:flex-row gap-4 items-center bg-gray-50/50 p-6 rounded-3xl border border-gray-100/50 hover:border-primary/20 transition-all group">
                                <div class="flex-1 w-full relative">
                                    <input type="text" name="features[en][]" value="{{ $enFeatures[$i] ?? '' }}" placeholder="Feature in English"
                                        class="w-full pl-6 pr-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none">
                                    <div class="absolute bottom-1 left-6 right-4 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
                                </div>
                                <div class="flex-1 w-full relative h-full">
                                    <input type="text" name="features[ar][]" value="{{ $arFeatures[$i] ?? '' }}" placeholder="الميزة بالعربية" dir="rtl"
                                        class="w-full pr-6 pl-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none font-alexandria text-right">
                                    <div class="absolute bottom-1 left-4 right-6 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
                                </div>
                                <button type="button" onclick="this.closest('.feature-item').remove()" class="w-10 h-10 rounded-xl bg-white text-gray-300 hover:text-red-500 hover:bg-red-50 transition-all flex items-center justify-center shadow-sm">
                                    <span class="material-icons text-lg">close</span>
                                </button>
                            </div>
                        @endfor
                    </div>
                    
                    <div class="mt-8 flex justify-center">
                        <button type="button" onclick="addFeature()" class="inline-flex items-center gap-2 px-8 py-3 rounded-2xl bg-gray-100 text-gray-500 text-xs font-black uppercase tracking-widest hover:bg-gray-200 hover:text-gray-700 transition-all active:scale-95">
                            <span class="material-icons text-sm">add</span>
                            {{ __('Add New Feature') }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Controls -->
            <div class="space-y-8">
                <!-- Meta & Settings -->
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Others & Config') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Service Category') }}</label>
                            <select name="category" required class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold appearance-none cursor-pointer">
                                <option value="Branding & Identity" {{ old('category', $service->category) == 'Branding & Identity' ? 'selected' : '' }}>Branding & Identity</option>
                                <option value="Digital Marketing" {{ old('category', $service->category) == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                <option value="Web Design & Development" {{ old('category', $service->category) == 'Web Design & Development' ? 'selected' : '' }}>Web Design & Development</option>
                                <option value="Production & Events" {{ old('category', $service->category) == 'Production & Events' ? 'selected' : '' }}>Production & Events</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Service Icon') }}</label>
                            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="e.g. trending_up"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Display Order') }}</label>
                            <input type="number" name="order" value="{{ old('order', $service->order) }}" min="0"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="active" value="1" {{ old('active', $service->active) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Media Area -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">{{ __('Service Visual') }}</h3>
                    
                    <div class="relative group aspect-square rounded-[32px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-4">
                        @if($service->image)
                            <img id="preview-image" src="{{ $service->image_url }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="material-icons text-white text-3xl">add_a_photo</span>
                            </div>
                        @else
                            <span class="material-icons text-4xl text-gray-200 mb-2">image</span>
                            <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest">{{ __('Upload Image') }}</span>
                        @endif
                        <input type="file" name="image" onchange="previewFile(event)" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

                <!-- Pricing -->
                <div class="bg-gray-900 rounded-[40px] p-8 shadow-2xl space-y-6">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-white/40 mb-6 ml-1">{{ __('Commercial Detail') }}</h3>
                    
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-white/40 mb-2 ml-1">{{ __('Price Type') }}</label>
                        <select name="price_type" required class="w-full px-5 py-3 rounded-2xl bg-white/5 border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-white text-sm font-bold appearance-none cursor-pointer">
                            <option value="fixed" class="bg-gray-800" {{ old('price_type', $service->price_type) == 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                            <option value="hourly" class="bg-gray-800" {{ old('price_type', $service->price_type) == 'hourly' ? 'selected' : '' }}>Hourly Rate</option>
                            <option value="project" class="bg-gray-800" {{ old('price_type', $service->price_type) == 'project' ? 'selected' : '' }}>Starting at (Project)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-white/40 mb-2 ml-1">{{ __('Base Price') }}</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-primary font-black text-sm">$</span>
                            <input type="number" name="price" step="0.01" value="{{ old('price', $service->price) }}" class="w-full pl-10 pr-5 py-3 rounded-2xl bg-white/5 border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-white text-sm font-bold">
                        </div>
                    </div>
                </div>

                <!-- Final Action -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-5 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Synchronize Service') }}
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="w-full py-5 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Rollback Changes') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const newFeature = document.createElement('div');
    newFeature.className = 'feature-item flex flex-col md:flex-row gap-4 items-center bg-gray-50/50 p-6 rounded-3xl border border-gray-100/50 hover:border-primary/20 transition-all group';
    newFeature.innerHTML = `
        <div class="flex-1 w-full relative">
            <input type="text" name="features[en][]" placeholder="Feature in English"
                class="w-full pl-6 pr-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none">
            <div class="absolute bottom-1 left-6 right-4 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
        </div>
        <div class="flex-1 w-full relative h-full">
            <input type="text" name="features[ar][]" placeholder="الميزة بالعربية" dir="rtl"
                class="w-full pr-6 pl-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none font-alexandria text-right">
            <div class="absolute bottom-1 left-4 right-6 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
        </div>
        <button type="button" onclick="this.closest('.feature-item').remove()" class="w-10 h-10 rounded-xl bg-white text-gray-300 hover:text-red-500 hover:bg-red-50 transition-all flex items-center justify-center shadow-sm">
            <span class="material-icons text-lg">close</span>
        </button>
    `;
    container.appendChild(newFeature);
}

function previewFile(event) {
    const output = document.getElementById('preview-image') || document.createElement('img');
    if (!output.id) {
        output.id = 'preview-image';
        output.className = 'absolute inset-0 w-full h-full object-cover';
        event.target.parentElement.appendChild(output);
    }
    output.src = URL.createObjectURL(event.target.files[0]);
}

</script>
@endsection
