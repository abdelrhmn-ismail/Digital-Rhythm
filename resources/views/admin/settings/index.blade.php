@extends('admin.layouts.app')

@section('title', __('Global Settings'))

@section('content')
<div class="max-w-7xl mx-auto pb-24">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                    <span class="text-gray-400">{{ __('SYSTEM') }}</span>
                    <span class="text-gray-300">/</span>
                    <span class="text-gray-400">{{ __('GLOBAL CONFIGURATION') }}</span>
                </div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Settings') }}</h1>
            </div>
            
            <button type="submit" class="inline-flex items-center gap-3 px-10 py-5 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                <span class="material-icons text-sm">save</span>
                {{ __('Commit Changes') }}
            </button>
        </div>

        <div x-data="{ section: 'branding' }" class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Navigation Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[40px] p-4 shadow-sm border border-gray-100 sticky top-6">
                    <nav class="space-y-2">
                        <button type="button" @click="section = 'branding'" :class="section === 'branding' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-left">
                            <span class="material-icons text-lg">palette</span>
                            {{ __('Visual Identity') }}
                        </button>
                        <button type="button" @click="section = 'seo'" :class="section === 'seo' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-left">
                            <span class="material-icons text-lg">search</span>
                            {{ __('SEO & Search') }}
                        </button>
                        <button type="button" @click="section = 'contact'" :class="section === 'contact' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-left">
                            <span class="material-icons text-lg">contact_mail</span>
                            {{ __('Contact Info') }}
                        </button>
                        <button type="button" @click="section = 'social'" :class="section === 'social' ? 'bg-primary/5 text-primary' : 'text-gray-400 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-6 py-4 rounded-3xl text-xs font-black uppercase tracking-widest transition-all text-left">
                            <span class="material-icons text-lg">share</span>
                            {{ __('Social Channels') }}
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="lg:col-span-3">
                <!-- Visual Identity Section -->
                <div x-show="section === 'branding'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                        <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                            <span class="material-icons text-sm">visibility</span>
                            {{ __('Logos & Visuals') }}
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 ml-1">{{ __('Primary Logo') }}</label>
                                <div class="relative group aspect-video rounded-[32px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-8 bg-grid">
                                    @if(isset($settings['site_logo']))
                                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="max-h-full object-contain mix-blend-multiply">
                                    @else
                                        <span class="material-icons text-gray-200 text-4xl mb-2">cloud_upload</span>
                                        <span class="text-[9px] font-black text-gray-300 uppercase tracking-widest">{{ __('Upload Brand Logo') }}</span>
                                    @endif
                                    <input type="file" name="logo" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 ml-1">{{ __('Site Favicon') }}</label>
                                <div class="relative group w-32 h-32 rounded-[24px] overflow-hidden bg-gray-50 border-2 border-dashed border-gray-100 hover:border-primary/20 transition-all flex flex-col items-center justify-center p-4 mx-auto">
                                    @if(isset($settings['site_favicon']))
                                        <img src="{{ asset('storage/' . $settings['site_favicon']) }}" class="w-12 h-12 object-contain">
                                    @else
                                        <span class="material-icons text-gray-200 text-2xl mb-1">style</span>
                                        <span class="text-[8px] font-black text-gray-300 uppercase tracking-widest">{{ __('ICO/PNG') }}</span>
                                    @endif
                                    <input type="file" name="favicon" class="absolute inset-0 opacity-0 cursor-pointer">
                                </div>
                                <p class="text-[9px] text-gray-300 mt-4 text-center italic">{{ __('Recommended size: 32x32px or 64x64px') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100">
                        <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                            <span class="material-icons text-sm">palette</span>
                            {{ __('Color Palette (CSS Variables)') }}
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @php
                                $colors = [
                                    ['key' => 'color_primary', 'label' => 'Primary Brand', 'default' => '#01194A'],
                                    ['key' => 'color_secondary', 'label' => 'Secondary Brand', 'default' => '#0087CE'],
                                    ['key' => 'color_accent', 'label' => 'Accent (UI)', 'default' => '#7800A8'],
                                    ['key' => 'color_background', 'label' => 'Site BG', 'default' => '#F8F9FA'],
                                    ['key' => 'color_surface', 'label' => 'Surface Card', 'default' => '#FFFFFF'],
                                    ['key' => 'color_text', 'label' => 'Body Text', 'default' => '#333333'],
                                ];
                            @endphp

                            @foreach($colors as $color)
                                <div class="bg-gray-50/50 p-6 rounded-3xl border border-gray-100 flex items-center gap-4 group">
                                    <div class="relative w-12 h-12 rounded-2xl overflow-hidden shadow-sm border-2 border-white group-hover:scale-110 transition-transform">
                                        <input type="color" name="{{ $color['key'] }}" value="{{ $settings[$color['key']] ?? $color['default'] }}" class="absolute -inset-2 w-16 h-16 cursor-pointer border-0 p-0" oninput="this.parentElement.nextElementSibling.querySelector('.hex-val').textContent = this.value">
                                    </div>
                                    <div>
                                        <label class="block text-[9px] font-black uppercase tracking-widest text-gray-400 mb-1">{{ __($color['label']) }}</label>
                                        <span class="hex-val text-xs font-bold text-gray-700 font-mono">{{ $settings[$color['key']] ?? $color['default'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                <div x-show="section === 'seo'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                        <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                            <span class="material-icons text-sm">search</span>
                            {{ __('Engine Visibility') }}
                        </h3>

                        <div class="space-y-8">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Main Site Title') }}</label>
                                <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" placeholder="Digital Rhythm | Full Scale Marketing Agency" 
                                    class="w-full px-8 py-5 rounded-3xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-lg font-black text-gray-900 shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Global Keywords') }}</label>
                                <input type="text" name="site_keywords" value="{{ $settings['site_keywords'] ?? '' }}" placeholder="marketing, creative, seo, branding" 
                                    class="w-full px-8 py-5 rounded-3xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-600 shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Meta Description') }}</label>
                                <textarea name="site_description" class="tinymce w-full px-8 py-5 rounded-[32px] bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-medium leading-relaxed shadow-inner" placeholder="Enter a brief, compelling description for search engines...">{{ $settings['site_description'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="mt-12 p-8 bg-primary/5 rounded-[32px] border border-primary/10 flex gap-6 items-start">
                            <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center shadow-sm shrink-0">
                                <span class="material-icons text-primary">tips_and_updates</span>
                            </div>
                            <div>
                                <h4 class="text-xs font-black uppercase tracking-widest text-primary/80 mb-2">{{ __('Search Best Practices') }}</h4>
                                <p class="text-xs text-primary/60 leading-relaxed font-bold">Keep your meta title under <span class="text-primary font-black">60 characters</span> and description under <span class="text-primary font-black">160 characters</span> for optimal Google display. Use high-impact keywords early in the description.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & Social Sections (Condensed) -->
                <div x-show="['contact', 'social'].includes(section)" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <!-- Contact Section -->
                    <div x-show="section === 'contact'" class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100">
                        <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                            <span class="material-icons text-sm">contact_support</span>
                            {{ __('Communication Points') }}
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Public Email') }}</label>
                                <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" 
                                    class="w-full px-8 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-800 shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Helpline phone') }}</label>
                                <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" 
                                    class="w-full px-8 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold text-gray-800 shadow-inner">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-3 ml-1">{{ __('Operational HQ Address') }}</label>
                                <textarea name="contact_address" class="tinymce h-32">{{ $settings['contact_address'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Social Section -->
                    <div x-show="section === 'social'" class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100">
                        <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                            <span class="material-icons text-sm">share</span>
                            {{ __('Social Network URLs') }}
                        </h3>
                        
                        <div class="grid grid-cols-1 gap-6">
                            @foreach(['instagram' => 'Instagram Handle', 'twitter' => 'Twitter / X Profile', 'linkedin' => 'LinkedIn Page'] as $key => $label)
                                <div class="flex items-center gap-6 p-6 rounded-3xl bg-gray-50/50 border border-gray-100 group">
                                    <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                        <span class="material-icons text-primary/60">{{ $key === 'twitter' ? 'close' : ($key === 'instagram' ? 'camera_alt' : 'business') }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-[9px] font-black uppercase tracking-widest text-gray-400 mb-1 ml-1">{{ __($label) }}</label>
                                        <input type="text" name="social_{{ $key }}" value="{{ $settings['social_'.$key] ?? '' }}" placeholder="https://..."
                                            class="w-full bg-transparent border-transparent focus:ring-0 outline-none text-sm font-bold text-gray-700">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- "Others" organized inputs (as requested) -->
                <div class="mt-8 bg-gray-900 rounded-[40px] p-10 shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-primary opacity-0 group-hover:opacity-5 transition-opacity"></div>
                    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-white/40 mb-8 ml-1">
                        <span class="material-icons text-sm">miscellaneous_services</span>
                        {{ __('Runtime Parameters') }}
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-white">
                        <div class="bg-white/5 p-6 rounded-3xl border border-white/5 space-y-4">
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-white/60 mb-4">{{ __('Maintenance Mode') }}</h4>
                            <label class="flex items-center justify-between cursor-pointer group/toggle">
                                <span class="text-xs font-bold text-white/40 group-hover/toggle:text-white/80 transition-colors">{{ __('System Active Status') }}</span>
                                <div class="relative w-12 h-6 rounded-full bg-white/10 group-hover/toggle:bg-white/20 transition-colors">
                                    <input type="checkbox" name="is_online" value="1" {{ ($settings['is_online'] ?? '1') == '1' ? 'checked' : '' }} class="sr-only peer">
                                    <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white/20 transition-all shadow-sm"></div>
                                </div>
                            </label>
                        </div>
                        <div class="bg-white/5 p-6 rounded-3xl border border-white/5 space-y-4">
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-white/60 mb-4">{{ __('Advanced Debug') }}</h4>
                            <label class="flex items-center justify-between cursor-pointer group/toggle">
                                <span class="text-xs font-bold text-white/40 group-hover/toggle:text-white/80 transition-colors">{{ __('Verbose Error Logging') }}</span>
                                <div class="relative w-12 h-6 rounded-full bg-white/10 group-hover/toggle:bg-white/20 transition-colors">
                                    <input type="checkbox" name="debug_mode" value="1" {{ ($settings['debug_mode'] ?? '0') == '1' ? 'checked' : '' }} class="sr-only peer">
                                    <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white/20 transition-all shadow-sm"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Footer Summary Actions -->
                <div class="mt-8 flex flex-col items-center justify-center space-y-4">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-300 italic">{{ __('Review all tabs before committing bulk update') }}</p>
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

<style>
.bg-grid {
    background-image: radial-gradient(circle, #E5E7EB 1px, transparent 1px);
    background-size: 20px 20px;
}
[x-cloak] { display: none !important; }
</style>
@endsection
