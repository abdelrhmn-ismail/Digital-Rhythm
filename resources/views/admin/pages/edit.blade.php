@extends('admin.layouts.app')

@section('title', __('Edit Page') . ': ' . $page->title)

@section('content')
<div class="max-w-7xl mx-auto pb-24">
    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                    <a href="{{ route('admin.pages.index') }}" class="text-gray-400 hover:text-primary transition-colors">{{ __('PAGES') }}</a>
                    <span class="text-gray-300">/</span>
                    <span class="text-gray-400 uppercase">{{ __('EDITING') }}</span>
                </div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ $page->getTranslation('title', 'en') }}</h1>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.pages.index') }}" class="px-8 py-4 rounded-[24px] bg-white text-gray-400 text-xs font-black uppercase tracking-[0.3em] hover:text-gray-600 transition-all border border-gray-100 italic">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="inline-flex items-center gap-3 px-10 py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                    <span class="material-icons text-sm">save</span>
                    {{ __('Save Page') }}
                </button>
            </div>
        </div>

        <div x-data="{ lang: 'en' }" class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Left Sidebar: Controls -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100">
                    <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 flex items-center gap-2">
                        <span class="material-icons text-sm">settings</span>
                        {{ __('Configuration') }}
                    </h3>
                    
                    <div class="space-y-6">
                        <label class="flex items-center justify-between cursor-pointer group">
                            <span class="text-xs font-bold text-gray-500 group-hover:text-gray-900 transition-colors">{{ __('Page Active') }}</span>
                            <div class="relative w-12 h-6 rounded-full bg-gray-100 transition-colors">
                                <input type="checkbox" name="is_active" value="1" {{ $page->is_active ? 'checked' : '' }} class="sr-only peer">
                                <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-gray-300 transition-all shadow-sm"></div>
                            </div>
                        </label>
                        
                        <div class="pt-6 border-t border-gray-50">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">{{ __('URL Slug') }}</label>
                            <input type="text" value="/{{ $page->slug }}" disabled class="w-full bg-gray-50 border-0 rounded-xl px-4 py-2 text-xs font-mono text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Language Switcher -->
                <div class="bg-white rounded-[40px] p-4 shadow-sm border border-gray-100">
                    <nav class="space-y-2">
                        <button type="button" @click="lang = 'en'" :class="lang === 'en' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-left">
                            <span class="material-icons text-lg">language</span>
                            {{ __('English Content') }}
                        </button>
                        <button type="button" @click="lang = 'ar'" :class="lang === 'ar' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center justify-end gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-right">
                            {{ __('Arabic Content') }}
                            <span class="material-icons text-lg">language</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Right Area: Editor -->
            <div class="lg:col-span-3">
                <!-- English Editor -->
                <div x-show="lang === 'en'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100">
                        <div class="mb-10">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('English Title') }}</label>
                            <input type="text" name="title[en]" value="{{ old('title.en', $page->getTranslation('title', 'en')) }}" class="w-full px-8 py-5 rounded-3xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-xl font-black text-gray-900 shadow-inner">
                        </div>
                        
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('English Content') }}</label>
                            <textarea name="content[en]" class="tinymce h-[500px]">{{ old('content.en', $page->getTranslation('content', 'en')) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Arabic Editor -->
                <div x-show="lang === 'ar'" dir="rtl" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8 text-right">
                    <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100">
                        <div class="mb-10">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 mr-1">{{ __('Arabic Title') }}</label>
                            <input type="text" name="title[ar]" value="{{ old('title.ar', $page->getTranslation('title', 'ar')) }}" class="w-full px-8 py-5 rounded-3xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-2xl font-black text-gray-900 shadow-inner text-right">
                        </div>
                        
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 mr-1">{{ __('Arabic Content') }}</label>
                            <textarea name="content[ar]" class="tinymce h-[500px]">{{ old('content.ar', $page->getTranslation('content', 'ar')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '.tinymce',
        menubar: 'edit insert view format table tools help',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace vertical align visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        skin: 'oxide',
        content_css: 'default',
        height: 500,
        branding: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
});
</script>

<style>
[x-cloak] { display: none !important; }
.tox-tinymce {
    border-radius: 24px !important;
    border: none !important;
    box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.05) !important;
    background-color: #F9FAFB !important;
}
</style>
@endsection
