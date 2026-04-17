@extends('admin.layouts.app')

@section('title', __('Add Partner'))

@section('content')
<div class="max-w-6xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <a href="{{ route('admin.partners.index') }}" class="hover:text-primary/70 transition-colors">{{ __('PARTNERS') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('NEW LOGO') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Register Partner') }}</h1>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Basic Info -->
                <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                    
                    <div class="space-y-6">
                        <h3 class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-6">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                            {{ __('Partner Identity') }}
                        </h3>
                        
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 ml-1">{{ __('Partner Name / Title') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full px-6 py-4 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none font-bold text-gray-900 shadow-inner @error('name') border-red-500 @enderror" placeholder="Enter partner name (e.g. Google)">
                            @error('name')
                                <p class="text-red-500 text-[10px] mt-1 ml-1 font-bold italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <x-admin.image-upload 
                    name="logo"
                    :label="__('Upload Partner Logo')"
                    :placeholder="__('Click to Upload Logo (PNG/SVG)')"
                    aspect="aspect-[4/1]"
                    required="true"
                />
            </div>

            <!-- Sidebar Controls -->
            <div class="space-y-8">
                <div class="bg-primary/5 rounded-[40px] p-8 border border-primary/10 space-y-8">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary/60 mb-8 ml-1">{{ __('Sorting & Status') }}</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-primary/40 mb-2 ml-1">{{ __('Display Order') }}</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                                class="w-full px-5 py-3 rounded-2xl bg-white border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-bold shadow-sm">
                        </div>

                        <div class="pt-4 border-t border-primary/10">
                            <label class="flex items-center justify-between cursor-pointer group">
                                <span class="text-xs font-black uppercase tracking-widest text-primary/60">{{ __('Active Status') }}</span>
                                <div class="relative w-12 h-6 rounded-full bg-gray-200 group-hover:bg-gray-300 transition-colors">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="sr-only peer">
                                    <div class="peer-checked:translate-x-6 peer-checked:bg-primary absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-all shadow-sm"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Final Actions -->
                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-xs font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Add Partner') }}
                    </button>
                    <a href="{{ route('admin.partners.index') }}" class="w-full py-4 rounded-[24px] bg-white text-gray-400 text-[10px] font-black uppercase tracking-[0.3em] text-center border border-gray-100 hover:bg-gray-50 transition-all active:scale-95">
                        {{ __('Discard & Return') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
