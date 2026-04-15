@extends('admin.layouts.app')

@section('title', __('Global Settings | Admin Dashboard'))

@section('content')
<div class="px-6 py-6 font-sans">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-8 flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">{{ __('System Settings') }}</h1>
                <p class="text-muted text-sm">{{ __("Control your website's identity, SEO, and visual branding") }}</p>
            </div>
            <button type="submit" class="bg-primary text-foreground px-8 py-3 rounded-xl font-black shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all flex items-center gap-2">
                <span class="material-icons">save</span>
                {{ __('Save All Changes') }}
            </button>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3 animate-pulse">
            <span class="material-icons">check_circle</span>
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Branding Section -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="material-icons text-primary">palette</span> Visual Identity
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-3">Site Logo</label>
                            <div class="relative group aspect-video rounded-xl border-2 border-dashed border-gray-100 bg-gray-50 flex flex-col items-center justify-center p-4 transition-all hover:border-primary/50 overflow-hidden">
                                @if(isset($settings['site_logo']))
                                    <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="max-h-full object-contain mb-2">
                                @else
                                    <span class="material-icons text-gray-300 text-4xl">image</span>
                                    <span class="text-xs text-muted font-bold mt-2">Upload Logo</span>
                                @endif
                                <input type="file" name="logo" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-3">Favicon</label>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-lg border-2 border-dashed border-gray-100 bg-gray-50 flex items-center justify-center overflow-hidden">
                                     @if(isset($settings['site_favicon']))
                                        <img src="{{ asset('storage/' . $settings['site_favicon']) }}" class="w-8 h-8 object-contain">
                                    @else
                                        <span class="material-icons text-gray-300">broken_image</span>
                                    @endif
                                </div>
                                <input type="file" name="favicon" class="text-xs text-gray-500 flex-1">
                            </div>
                        </div>

                        <!-- Color Palette Settings -->
                        <div class="pt-4 border-t border-gray-100 mt-6">
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-3">Color Palette</label>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Primary Color</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_primary" value="{{ $settings['color_primary'] ?? '#01194A' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_primary'] ?? '#01194A' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Secondary Color</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_secondary" value="{{ $settings['color_secondary'] ?? '#0087CE' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_secondary'] ?? '#0087CE' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Accent (Purple)</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_accent" value="{{ $settings['color_accent'] ?? '#7800A8' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_accent'] ?? '#7800A8' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Background Color</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_background" value="{{ $settings['color_background'] ?? '#F8F9FA' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_background'] ?? '#F8F9FA' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Surface Color</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_surface" value="{{ $settings['color_surface'] ?? '#FFFFFF' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_surface'] ?? '#FFFFFF' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-1">Text Color</label>
                                    <div class="flex items-center gap-2">
                                        <input type="color" name="color_text" value="{{ $settings['color_text'] ?? '#333333' }}" class="w-8 h-8 rounded cursor-pointer border-0 p-0" oninput="this.nextElementSibling.value = this.value">
                                        <input type="text" value="{{ $settings['color_text'] ?? '#333333' }}" class="text-xs text-gray-500 w-full px-2 py-1 bg-gray-50 border border-gray-100 rounded focus:outline-none" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="material-icons text-primary">contact_support</span> Contact Info
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">Support Email</label>
                            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="w-full px-4 py-2 bg-gray-50 border border-gray-100 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">Phone Number</label>
                            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" class="w-full px-4 py-2 bg-gray-50 border border-gray-100 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">Office Address</label>
                            <textarea name="contact_address" class="w-full px-4 py-2 bg-gray-50 border border-gray-100 rounded-lg focus:ring-2 focus:ring-primary/20 outline-none" rows="2">{{ $settings['contact_address'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO & Meta Section -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-8 flex items-center gap-2">
                        <span class="material-icons text-primary">search</span> Search Engine Optimization (SEO)
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-2">Meta Title (Site Name)</label>
                            <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" placeholder="Golden Bee | Creative Marketing Agency" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-primary/10 outline-none text-lg font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-2">Meta Description</label>
                            <textarea name="site_description" rows="4" placeholder="Leading marketing agency in Saudi Arabia providing creative solutions..." class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-primary/10 outline-none">{{ $settings['site_description'] ?? '' }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-muted uppercase tracking-widest mb-2">Keywords (comma separated)</label>
                            <input type="text" name="site_keywords" value="{{ $settings['site_keywords'] ?? '' }}" placeholder="marketing, creative, branding, agency, saudi" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-primary/10 outline-none">
                        </div>
                    </div>

                    <div class="mt-10 p-6 bg-blue-50 border border-blue-100 rounded-2xl">
                        <div class="flex gap-4">
                            <span class="material-icons text-blue-600">tips_and_updates</span>
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">SEO Tip</h4>
                                <p class="text-sm text-blue-700 leading-relaxed">Keep your Meta Title under 60 characters and Description under 160 characters for best results in Google search results.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-8 flex items-center gap-2">
                        <span class="material-icons text-primary">share</span> Social Media Presence
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">Instagram URL</label>
                            <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-lg outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">Twitter (X) URL</label>
                            <input type="text" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-lg outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">LinkedIn URL</label>
                            <input type="text" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-lg outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
