@extends('admin.layouts.app')

@section('title', __('Create Service'))

@section('content')
<div x-data="{ tab: 'en' }" class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.services.index') }}" class="hover:text-primary/70 transition-colors">{{ __('SERVICES') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('CREATE SERVICE') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('New Service') }}</h1>
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

    <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-8">
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Service Title') }}</label>
                                    <input type="text" name="title[en]" value="{{ old('title.en') }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner" placeholder="Service name in English">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Brief Description') }}</label>
                                    <textarea name="description[en]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner" placeholder="Elevator pitch for the service...">{{ old('description.en') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Full Service Details') }}</label>
                                    <textarea name="content[en]" class="tinymce h-64">{{ old('content.en') }}</textarea>
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
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('عنوان الخدمة') }}</label>
                                    <input type="text" name="title[ar]" value="{{ old('title.ar') }}" required 
                                        class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner text-right font-alexandria" placeholder="عنوان الخدمة بالعربية">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('وصف مختصر') }}</label>
                                    <textarea name="description[ar]" required 
                                        class="tinymce w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[100px] shadow-inner text-right font-alexandria" placeholder="وصف موجز للخدمة...">{{ old('description.ar') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 mr-1 font-alexandria">{{ __('تفاصيل الخدمة') }}</label>
                                    <textarea name="content[ar]" class="tinymce h-64 text-right font-alexandria">{{ old('content.ar') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Controls -->
            <div class="space-y-8">
                <!-- Meta & Settings -->
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Service Meta & Others') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1 text-alexandria">{{ __('Category') }}</label>
                            <select name="category" required class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold appearance-none cursor-pointer">
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-primary/10 space-y-4">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Featured Item') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Item') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                <input type="checkbox" name="active" value="1" {{ old('active', '1') ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Main Icon -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Service Icon') }}</h3>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Material Icon Name') }}</label>
                        <input type="text" name="icon" value="{{ old('icon', 'home_repair_service') }}" required 
                            class="w-full px-5 py-3 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold shadow-inner" placeholder="e.g. web, brush, lightbulb">
                        <p class="text-xs text-gray-400 mt-2 ml-1">Use a Google Material Icon name.</p>
                    </div>
                </div>

                <!-- Final Action -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Save Service') }}
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="w-full py-4 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Cancel & Return') }}
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
        height: 300,
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
