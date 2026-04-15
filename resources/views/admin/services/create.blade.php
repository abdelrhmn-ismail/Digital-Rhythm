@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-2">
            <a href="{{ route('admin.services.index') }}" class="hover:text-gray-900">Services</a>
            <span>/</span>
            <span>Create</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">Create Service</h1>
        <p class="text-gray-600 mt-1">Add a new service offering</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Title (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title[en]" required
                               value="{{ old('title.en') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        @error('title.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (Arabic) *</label>
                        <input type="text" name="title[ar]" required dir="rtl"
                               value="{{ old('title.ar') }}"
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
                               value="{{ old('slug') }}"
                               placeholder="auto-generated from English title"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                        <input type="text" name="icon"
                               value="{{ old('icon') }}"
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
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('description.en') }}</textarea>
                        @error('description.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabic) *</label>
                        <textarea name="description[ar]" rows="3" required dir="rtl"
                                  placeholder="وصف مختصر باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('description.ar') }}</textarea>
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
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('content.en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Content (Arabic)</label>
                        <textarea name="content[ar]" rows="6" dir="rtl"
                                  placeholder="الوصف الكامل باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('content.ar') }}</textarea>
                    </div>
                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Service Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    <p class="mt-1 text-sm text-gray-500">Optional: Service image (max 2MB)</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                    <input type="text" name="icon"
                           value="{{ old('icon') }}"
                           placeholder="e.g., trending_up, code, palette"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    <p class="mt-1 text-sm text-gray-500">Material Icons name</p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Features -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Service Features (EN / AR)</label>
                    <div id="features-container" class="space-y-4">
                        <div class="flex flex-col md:flex-row gap-4 items-start bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <div class="flex-1 w-full">
                                <input type="text" name="features[en][]" placeholder="Feature in English"
                                       value="{{ old('features.en.0') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                            </div>
                            <div class="flex-1 w-full">
                                <input type="text" name="features[ar][]" placeholder="الميزة باللغة العربية" dir="rtl"
                                       value="{{ old('features.ar.0') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                            </div>
                            <button type="button" onclick="addFeature()" class="px-3 py-2 bg-primary text-white rounded-lg hover-bg-primary">
                                <span class="material-icons">add</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Price and Order Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type="number" name="price" step="0.01" min="0"
                               value="{{ old('price') }}"
                               placeholder="0.00"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price Type *</label>
                        <select name="price_type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                            <option value="fixed" {{ old('price_type', 'fixed') == 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                            <option value="hourly" {{ old('price_type') == 'hourly' ? 'selected' : '' }}>Hourly Rate</option>
                            <option value="project" {{ old('price_type') == 'project' ? 'selected' : '' }}>Starting at (Project)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                        <input type="number" name="order" min="0" value="{{ old('order', 0) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                </div>

                <!-- Status Options -->
                <div class="flex items-end gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-primary focus-ring-primary">
                        <span class="text-sm font-medium text-gray-700">Featured</span>
                    </label>
                    
                    <label class="flex items-center">
                        <input type="checkbox" name="active" value="1" {{ old('active', '1') ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-primary focus-ring-primary">
                        <span class="text-sm font-medium text-gray-700">Active</span>
                    </label>
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
                    Create Service
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const featureCount = container.children.length;
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






