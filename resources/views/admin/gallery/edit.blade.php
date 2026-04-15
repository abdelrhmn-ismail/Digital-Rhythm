@extends('admin.layouts.app')

@section('title', __('Edit Gallery Image'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-2">
            <a href="{{ route('admin.gallery.index') }}" class="hover:text-gray-900">{{ __('Gallery') }}</a>
            <span>/</span>
            <span>{{ __('Edit Image') }}</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">{{ __('Edit Gallery Image') }}</h1>
        <p class="text-gray-600 mt-1">{{ __('Update gallery image details') }}</p>
    </div>

    <!-- Current Image Preview -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Current Image') }}</h2>
        <div class="relative inline-block">
            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                 class="max-w-md rounded-lg shadow-md">
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.gallery.update', $gallery) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <!-- Replace Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Replace Image') }} (optional)</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    <p class="text-xs text-gray-500 mt-1">{{ __('Max size: 5MB. Supported: JPEG, PNG, JPG, GIF, WebP') }}</p>
                </div>

                <!-- Title (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Title (English)') }}</label>
                        <input type="text" name="title[en]" value="{{ old('title.en', $gallery->title ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Title (Arabic)') }}</label>
                        <input type="text" name="title[ar]" value="{{ old('title.ar', $gallery->getTranslation('title', 'ar') ?? '') }}" dir="rtl"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                    </div>
                </div>

                <!-- Caption (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Caption (English)') }}</label>
                        <textarea name="caption[en]" rows="2"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('caption.en', $gallery->caption ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Caption (Arabic)') }}</label>
                        <textarea name="caption[ar]" rows="2" dir="rtl"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('caption.ar', $gallery->getTranslation('caption', 'ar') ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Category and Tags -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Category') }}</label>
                        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $gallery->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Tags') }}</label>
                        <input type="text" name="tags" value="{{ old('tags', is_array($gallery->tags) ? implode(', ', $gallery->tags) : $gallery->tags) }}"
                               placeholder="{{ __('web, design, modern') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        <p class="text-xs text-gray-500 mt-1">{{ __('Comma-separated tags') }}</p>
                    </div>
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Display Order') }}</label>
                    <input type="number" name="order" value="{{ old('order', $gallery->order) }}" min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    <p class="text-xs text-gray-500 mt-1">{{ __('Lower numbers appear first') }}</p>
                </div>

                <!-- Toggles -->
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary focus-ring-primary">
                        <span class="text-sm font-medium text-gray-700">{{ __('Active') }}</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary focus-ring-primary">
                        <span class="text-sm font-medium text-gray-700">{{ __('Featured') }}</span>
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover-bg-primary transition-colors">
                    {{ __('Update Image') }}
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection



