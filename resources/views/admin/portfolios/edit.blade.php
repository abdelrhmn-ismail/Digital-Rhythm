@extends('admin.layouts.app')

@section('title', __('Edit Portfolio') . ': ' . $portfolio->getTranslation('title', 'en'))

@section('content')
<div x-data="{ tab: 'en' }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.portfolios.index') }}" class="hover:text-primary/70 transition-colors">{{ __('PORTFOLIO') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('EDIT PROJECT') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Edit Project') }}</h1>
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

    <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" enctype="multipart/form-data" class="space-y-8">
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Project Title') }}</label>
                                    <input type="text" name="title[en]" value="{{ old('title.en', $portfolio->getTranslation('title', 'en')) }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Client Name') }}</label>
                                    <input type="text" name="client[en]" value="{{ old('client.en', $portfolio->getTranslation('client', 'en')) }}"
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Brief Description') }}</label>
                                    <textarea name="description[en]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner">{{ old('description.en', $portfolio->getTranslation('description', 'en')) }}</textarea>
                                 </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Project Story') }}</label>
                                    <textarea name="content[en]" class="tinymce h-64">{{ old('content.en', $portfolio->getTranslation('content', 'en')) }}</textarea>
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('عنوان المشروع') }}</label>
                                    <input type="text" name="title[ar]" value="{{ old('title.ar', $portfolio->getTranslation('title', 'ar')) }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner text-right font-alexandria">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('اسم العميل') }}</label>
                                    <input type="text" name="client[ar]" value="{{ old('client.ar', $portfolio->getTranslation('client', 'ar')) }}"
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner text-right font-alexandria">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('وصف مختصر') }}</label>
                                    <textarea name="description[ar]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner text-right font-alexandria">{{ old('description.ar', $portfolio->getTranslation('description', 'ar')) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('قصة المشروع') }}</label>
                                    <textarea name="content[ar]" class="tinymce h-64 text-right font-alexandria">{{ old('content.ar', $portfolio->getTranslation('content', 'ar')) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technologies & Stack -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-8 ml-1">
                        <span class="material-icons text-sm">settings_input_component</span>
                        {{ __('Tech Stack Used') }}
                    </h3>
                    
                    <div id="technologies-container" class="space-y-4">
                        @php
                            $enTechs = old('technologies.en', $portfolio->getTranslation('technologies', 'en') ?? []);
                            $arTechs = old('technologies.ar', $portfolio->getTranslation('technologies', 'ar') ?? []);
                            $count = max(count($enTechs), count($arTechs), 1);
                        @endphp
                        
                        @for($i = 0; $i < $count; $i++)
                            <div class="tech-item flex flex-col md:flex-row gap-4 items-center bg-gray-50/50 p-6 rounded-3xl border border-gray-100/50 hover:border-primary/20 transition-all group">
                                <div class="flex-1 w-full relative">
                                    <input type="text" name="technologies[en][]" value="{{ $enTechs[$i] ?? '' }}" placeholder="Technology (English)"
                                        class="w-full pl-6 pr-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none">
                                    <div class="absolute bottom-1 left-6 right-4 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
                                </div>
                                <div class="flex-1 w-full relative h-full">
                                    <input type="text" name="technologies[ar][]" value="{{ $arTechs[$i] ?? '' }}" placeholder="التقنية بالعربية" dir="rtl"
                                        class="w-full pr-6 pl-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none font-alexandria text-right">
                                    <div class="absolute bottom-1 left-4 right-6 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
                                </div>
                                <button type="button" @click="this.closest('.tech-item').remove()" class="w-10 h-10 rounded-xl bg-white text-gray-300 hover:text-red-500 hover:bg-red-50 transition-all flex items-center justify-center shadow-sm">
                                    <span class="material-icons text-lg">close</span>
                                </button>
                            </div>
                        @endfor
                    </div>
                    
                    <div class="mt-8 flex justify-center">
                        <button type="button" onclick="addTech()" class="inline-flex items-center gap-2 px-8 py-3 rounded-2xl bg-gray-100 text-gray-500 text-xs font-black uppercase tracking-widest hover:bg-gray-200 hover:text-gray-700 transition-all active:scale-95">
                            <span class="material-icons text-sm">add_circle_outline</span>
                            {{ __('Add New Technology') }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Controls -->
            <div class="space-y-8">
                <!-- Meta & Settings -->
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8 text-alexandria">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Project Meta & Others') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Category') }}</label>
                            <select name="category" required class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold appearance-none cursor-pointer">
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ old('category', $portfolio->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Project URL') }}</label>
                            <input type="url" name="project_url" value="{{ old('project_url', $portfolio->project_url) }}" placeholder="https://..."
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Completion Date') }}</label>
                            <input type="date" name="completed_date" value="{{ old('completed_date', $portfolio->completed_date ? $portfolio->completed_date->format('Y-m-d') : '') }}"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Item') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="featured" value="1" {{ old('featured', $portfolio->featured) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Item') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="active" value="1" {{ old('active', $portfolio->active) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Main Thumbnail -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">{{ __('Project Hero') }}</h3>
                    
                    <div class="relative group aspect-square rounded-[32px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-4">
                        @if($portfolio->thumbnail)
                            <img id="preview-thumbnail" src="{{ $portfolio->thumbnail_url }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                <span class="material-icons text-white text-3xl">cloud_upload</span>
                            </div>
                        @else
                            <span class="material-icons text-4xl text-gray-200 mb-2">add_photo_alternate</span>
                            <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest">{{ __('Upload Hero') }}</span>
                        @endif
                        <input type="file" name="thumbnail" onchange="previewThumbnail(event)" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

                <!-- Gallery Selection -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">{{ __('Gallery Mix') }}</h3>
                    
                    @if($portfolio->images)
                        <div class="grid grid-cols-4 gap-2 mb-4">
                            @foreach($portfolio->images_urls as $url)
                                <img src="{{ $url }}" class="aspect-square rounded-lg object-cover border border-gray-100 shadow-sm">
                            @endforeach
                        </div>
                    @endif

                    <div class="relative py-8 rounded-[24px] bg-gray-50 border-2 border-dashed border-gray-100 flex flex-col items-center justify-center text-center px-4 hover:border-primary/20 transition-all cursor-pointer group">
                        <span class="material-icons text-3xl text-gray-200 group-hover:text-primary/20 transition-colors mb-2">collections</span>
                        <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest group-hover:text-gray-400 transition-colors">{{ __('New Gallery Upload') }}</span>
                        <p class="text-[9px] text-gray-300 mt-1 italic">{{ __('Will replace existing') }}</p>
                        <input type="file" name="images[]" multiple class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

                <!-- Final Action -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Release Project') }}
                    </button>
                    <a href="{{ route('admin.portfolios.index') }}" class="w-full py-4 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Abort Update') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function addTech() {
    const container = document.getElementById('technologies-container');
    const newTech = document.createElement('div');
    newTech.className = 'tech-item flex flex-col md:flex-row gap-4 items-center bg-gray-50/50 p-6 rounded-3xl border border-gray-100/50 hover:border-primary/20 transition-all group';
    newTech.innerHTML = `
        <div class="flex-1 w-full relative">
            <input type="text" name="technologies[en][]" placeholder="Technology (English)"
                class="w-full pl-6 pr-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none">
            <div class="absolute bottom-1 left-6 right-4 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
        </div>
        <div class="flex-1 w-full relative h-full">
            <input type="text" name="technologies[ar][]" placeholder="التقنية بالعربية" dir="rtl"
                class="w-full pr-6 pl-4 py-3 bg-transparent border-transparent focus:ring-0 text-sm font-bold text-gray-700 outline-none font-alexandria text-right">
            <div class="absolute bottom-1 left-4 right-6 h-[1px] bg-gray-200 group-hover:bg-primary/20 transition-colors"></div>
        </div>
        <button type="button" onclick="this.closest('.tech-item').remove()" class="w-10 h-10 rounded-xl bg-white text-gray-300 hover:text-red-500 hover:bg-red-50 transition-all flex items-center justify-center shadow-sm">
            <span class="material-icons text-lg">close</span>
        </button>
    `;
    container.appendChild(newTech);
}

function previewThumbnail(event) {
    const output = document.getElementById('preview-thumbnail') || document.createElement('img');
    if (!output.id) {
        output.id = 'preview-thumbnail';
        output.className = 'absolute inset-0 w-full h-full object-cover';
        event.target.parentElement.appendChild(output);
    }
    output.src = URL.createObjectURL(event.target.files[0]);
}

</script>
@endsection


