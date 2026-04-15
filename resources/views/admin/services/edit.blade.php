@extends('admin.layouts.app')

@section('title', 'Edit Service: ' . $service->getTranslation('title', 'en'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-2">
            <a href="{{ route('admin.services.index') }}" class="hover:text-gray-900">Services</a>
            <span>/</span>
            <span>Edit</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Service</h1>
        <p class="text-gray-600 mt-1">Modify service details and translations</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Title (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title[en]" required
                               value="{{ old('title.en', $service->getTranslation('title', 'en')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        @error('title.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (Arabic) *</label>
                        <input type="text" name="title[ar]" required dir="rtl"
                               value="{{ old('title.ar', $service->getTranslation('title', 'ar')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                        @error('title.ar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Slug and Icon Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug (URL)</label>
                        <input type="text" name="slug"
                               value="{{ old('slug', $service->slug) }}"
                               placeholder="auto-generated from English title"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                        <input type="text" name="icon"
                               value="{{ old('icon', $service->icon) }}"
                               placeholder="e.g., trending_up, code, palette"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (English) *</label>
                        <textarea name="description[en]" rows="3" required
                                  placeholder="Brief description in English..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('description.en', $service->getTranslation('description', 'en')) }}</textarea>
                        @error('description.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabic) *</label>
                        <textarea name="description[ar]" rows="3" required dir="rtl"
                                  placeholder="وصف مختصر باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('description.ar', $service->getTranslation('description', 'ar')) }}</textarea>
                        @error('description.ar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Content (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Content (English)</label>
                        <textarea name="content[en]" rows="6"
                                  placeholder="Full description in English..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('content.en', $service->getTranslation('content', 'en')) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Content (Arabic)</label>
                        <textarea name="content[ar]" rows="6" dir="rtl"
                                  placeholder="الوصف الكامل باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('content.ar', $service->getTranslation('content', 'ar')) }}</textarea>
                    </div>
                </div>

                <!-- Image -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Service Image</label>
                        @if($service->image)
                            <div class="mb-2">
                                <img src="{{ $service->image_url }}" alt="Current" class="w-24 h-24 object-cover rounded-lg border">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        <p class="mt-1 text-sm text-gray-500">Max 2MB. Leave empty to keep current.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 items-end">
                        <label class="flex items-center mb-4">
                            <input type="checkbox" name="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }}
                                   class="mr-2 rounded border-gray-300 text-primary focus-ring-primary">
                            <span class="text-sm font-medium text-gray-700">Featured</span>
                        </label>
                        
                        <label class="flex items-center mb-4">
                            <input type="checkbox" name="active" value="1" {{ old('active', $service->active) ? 'checked' : '' }}
                                   class="mr-2 rounded border-gray-300 text-primary focus-ring-primary">
                            <span class="text-sm font-medium text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <!-- Features -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Service Features (EN / AR)</label>
                    <div id="features-container" class="space-y-4">
                        @php
                            $enFeatures = old('features.en', $service->getTranslation('features', 'en') ?? []);
                            $arFeatures = old('features.ar', $service->getTranslation('features', 'ar') ?? []);
                            $count = max(count($enFeatures), count($arFeatures), 1);
                        @endphp
                        
                        @for($i = 0; $i < $count; $i++)
                            <div class="flex flex-col md:flex-row gap-4 items-start bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex-1 w-full">
                                    <input type="text" name="features[en][]" placeholder="Feature in English"
                                           value="{{ $enFeatures[$i] ?? '' }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                                </div>
                                <div class="flex-1 w-full">
                                    <input type="text" name="features[ar][]" placeholder="الميزة باللغة العربية" dir="rtl"
                                           value="{{ $arFeatures[$i] ?? '' }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                                </div>
                                @if($i === 0)
                                    <button type="button" onclick="addFeature()" class="px-3 py-2 bg-primary text-white rounded-lg hover-bg-primary">
                                        <span class="material-icons">add</span>
                                    </button>
                                @else
                                    <button type="button" onclick="removeFeature(this)" class="px-3 py-2 bg-red-200 text-red-700 rounded-lg hover:bg-red-300">
                                        <span class="material-icons">remove</span>
                                    </button>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Price and Order Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type="number" name="price" step="0.01" min="0"
                               value="{{ old('price', $service->price) }}"
                               placeholder="0.00"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price Type *</label>
                        <select name="price_type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                            <option value="fixed" {{ old('price_type', $service->price_type) == 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                            <option value="hourly" {{ old('price_type', $service->price_type) == 'hourly' ? 'selected' : '' }}>Hourly Rate</option>
                            <option value="project" {{ old('price_type', $service->price_type) == 'project' ? 'selected' : '' }}>Starting at (Project)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                        <input type="number" name="order" min="0" value="{{ old('order', $service->order) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-primary text-white rounded-lg hover-bg-primary transition-colors">
                    Update Service
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const newFeature = document.createElement('div');
    newFeature.className = 'flex flex-col md:flex-row gap-4 items-start bg-gray-50 p-4 rounded-lg border border-gray-100';
    newFeature.innerHTML = `
        <div class="flex-1 w-full">
            <input type="text" name="features[en][]" placeholder="Feature in English"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
        </div>
        <div class="flex-1 w-full">
            <input type="text" name="features[ar][]" placeholder="الميزة باللغة العربية" dir="rtl"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
        </div>
        <button type="button" onclick="removeFeature(this)" class="px-3 py-2 bg-red-200 text-red-700 rounded-lg hover:bg-red-300">
            <span class="material-icons">remove</span>
        </button>
    `;
    container.appendChild(newFeature);
}

function removeFeature(button) {
    button.parentElement.remove();
}
</script>
@endsection



