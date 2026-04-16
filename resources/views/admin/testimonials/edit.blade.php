@extends('admin.layouts.app')

@section('title', __('Edit Testimonial') . ': ' . $testimonial->name)

@section('content')
<div x-data="{ tab: 'en' }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.testimonials.index') }}" class="hover:text-primary/70 transition-colors">{{ __('TESTIMONIALS') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('EDIT FEEDBACK') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Edit Feedback') }}</h1>
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

    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="space-y-8">
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
                                {{ __('English Testimony') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Client Name') }}</label>
                                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Position') }}</label>
                                        <input type="text" name="position[en]" value="{{ old('position.en', $testimonial->getTranslation('position', 'en')) }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Company') }}</label>
                                        <input type="text" name="company[en]" value="{{ old('company.en', $testimonial->getTranslation('company', 'en')) }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Feedback Content') }}</label>
                                    <textarea name="content[en]" class="tinymce h-48">{{ old('content.en', $testimonial->getTranslation('content', 'en')) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Content -->
                        <div x-show="tab === 'ar'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" dir="rtl">
                            <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6 font-alexandria">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('شهادة العميل بالعربية') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('اسم العميل') }}</label>
                                    <input type="text" value="{{ old('name', $testimonial->name) }}" disabled
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent text-gray-400 outline-none font-bold shadow-inner font-alexandria opacity-50">
                                    <span class="text-[9px] text-gray-300 mt-1 mr-2 italic">{{ __('الاسم موحد لجميع اللغات') }}</span>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('المنصب') }}</label>
                                        <input type="text" name="position[ar]" value="{{ old('position.ar', $testimonial->getTranslation('position', 'ar')) }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner font-alexandria text-right">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('الشركة') }}</label>
                                        <input type="text" name="company[ar]" value="{{ old('company.ar', $testimonial->getTranslation('company', 'ar')) }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner font-alexandria text-right">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('محتوى الشهادة') }}</label>
                                    <textarea name="content[ar]" class="tinymce h-48 text-right font-alexandria">{{ old('content.ar', $testimonial->getTranslation('content', 'ar')) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Controls -->
            <div class="space-y-8">
                <!-- Meta & Ratings -->
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Testimonial Meta & Others') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Rating') }}</label>
                            <div class="grid grid-cols-5 gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }} class="sr-only peer">
                                        <div class="aspect-square flex flex-col items-center justify-center rounded-xl bg-white border border-transparent peer-checked:bg-primary peer-checked:text-white transition-all shadow-sm">
                                            <span class="text-xs font-black">{{ $i }}</span>
                                            <span class="material-icons text-[10px]">star</span>
                                        </div>
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Display Order') }}</label>
                            <input type="number" name="order" value="{{ old('order', $testimonial->order) }}" min="0"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="featured" value="1" {{ old('featured', $testimonial->featured) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="active" value="1" {{ old('active', $testimonial->active) ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Profile Photo -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 space-y-6">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6 ml-1">{{ __('Client Image') }}</h3>
                    
                    <div class="relative group aspect-square rounded-full overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-4">
                        @if($testimonial->image)
                            <img id="preview-image" src="{{ $testimonial->image_url }}" alt="Preview" class="absolute inset-0 w-full h-full object-cover">
                        @else
                            <span class="material-icons text-4xl text-gray-200 mb-2">account_circle</span>
                        @endif
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                            <span class="material-icons text-white text-3xl">add_a_photo</span>
                        </div>
                        <input type="file" name="image" onchange="previewFile(event)" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

                <!-- Final Action -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-5 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Update Testimony') }}
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="w-full py-5 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Rollback Changes') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
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
