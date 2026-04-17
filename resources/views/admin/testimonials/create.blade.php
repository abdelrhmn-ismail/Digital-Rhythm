@extends('admin.layouts.app')

@section('title', __('Create Testimonial'))

@section('content')
<div x-data="{ tab: 'en', currentRating: {{ old('rating', 5) }} }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.testimonials.index') }}" class="hover:text-primary/70 transition-colors">{{ __('TESTIMONIALS') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('NEW FEEDBACK') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Create Feedback') }}</h1>
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

    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-8">
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
                            <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                {{ __('English Testimony') }}
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Client Name') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner" placeholder="Public name of the client">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Position') }}</label>
                                        <input type="text" name="position[en]" value="{{ old('position.en') }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner" placeholder="e.g. Marketing Director">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Company') }}</label>
                                        <input type="text" name="company[en]" value="{{ old('company.en') }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner" placeholder="Company name">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Feedback Content') }}</label>
                                    <textarea name="content[en]" class="tinymce h-48">{{ old('content.en') }}</textarea>
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('الاسم (سيتم استخدامه للغتين)') }}</label>
                                    <input type="text" disabled 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent text-gray-300 outline-none font-bold shadow-inner font-alexandria opacity-50" placeholder="اكتب الاسم في قسم اللغة الإنجليزية">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('المنصب') }}</label>
                                        <input type="text" name="position[ar]" value="{{ old('position.ar') }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner font-alexandria text-right" placeholder="مثلاً: مدير التسويق">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('الشركة') }}</label>
                                        <input type="text" name="company[ar]" value="{{ old('company.ar') }}"
                                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-700 shadow-inner font-alexandria text-right" placeholder="اسم الشركة">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('محتوى الشهادة') }}</label>
                                    <textarea name="content[ar]" class="tinymce h-48 text-right font-alexandria">{{ old('content.ar') }}</textarea>
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
                            <div class="flex items-center gap-1 bg-white/50 p-3 rounded-3xl border border-primary/5 w-fit">
                                @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" name="rating" value="{{ $i }}" 
                                            x-model="currentRating"
                                            class="sr-only">
                                        <div class="p-1 transition-all duration-300 transform group-hover:scale-125"
                                            :class="currentRating >= {{ $i }} ? 'text-amber-400' : 'text-gray-200'">
                                            <span class="material-icons text-3xl" 
                                                x-text="currentRating >= {{ $i }} ? 'star' : 'star_border'">
                                                star
                                            </span>
                                        </div>
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Display Order') }}</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold">
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Status') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="active" value="1" {{ old('active', '1') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>



                <!-- Final Action -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Deploy Testimony') }}
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="w-full py-4 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Cancel Creation') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>


document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '.tinymce',
        menubar: false,
        plugins: 'link lists autolink code',
        toolbar: 'bold italic | bullist numlist | link | removeformat | code',
        skin: 'oxide',
        content_css: 'default',
        height: 250,
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
