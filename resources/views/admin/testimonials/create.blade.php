@extends('admin.layouts.app')

@section('title', 'Create Testimonial')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-2">
            <a href="{{ route('admin.testimonials.index') }}" class="hover:text-gray-900">Testimonials</a>
            <span>/</span>
            <span>Create</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">Create Testimonial</h1>
        <p class="text-gray-600 mt-1">Add a new customer testimonial</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                    <input type="text" name="name" required
                           value="{{ old('name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Position -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                    <input type="text" name="position"
                           value="{{ old('position') }}"
                           placeholder="e.g., CEO, Marketing Director"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('position')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <input type="text" name="company"
                           value="{{ old('company') }}"
                           placeholder="e.g., Tech Innovations Inc."
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rating *</label>
                    <select name="rating" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="5.0" {{ old('rating') == '5.0' ? 'selected' : '' }}>5 Stars</option>
                        <option value="4.5" {{ old('rating') == '4.5' ? 'selected' : '' }}>4.5 Stars</option>
                        <option value="4.0" {{ old('rating') == '4.0' ? 'selected' : '' }}>4 Stars</option>
                        <option value="3.5" {{ old('rating') == '3.5' ? 'selected' : '' }}>3.5 Stars</option>
                        <option value="3.0" {{ old('rating') == '3.0' ? 'selected' : '' }}>3 Stars</option>
                        <option value="2.5" {{ old('rating') == '2.5' ? 'selected' : '' }}>2.5 Stars</option>
                        <option value="2.0" {{ old('rating') == '2.0' ? 'selected' : '' }}>2 Stars</option>
                        <option value="1.5" {{ old('rating') == '1.5' ? 'selected' : '' }}>1.5 Stars</option>
                        <option value="1.0" {{ old('rating') == '1.0' ? 'selected' : '' }}>1 Star</option>
                    </select>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Client Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Optional: Upload client photo (max 2MB)</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Content *</label>
                    <textarea name="content" rows="4" required
                              placeholder="Enter the testimonial text..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" min="0" value="{{ old('order', 0) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Options -->
                <div class="flex items-end gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Featured</span>
                    </label>
                    
                    <label class="flex items-center">
                        <input type="checkbox" name="active" value="1" {{ old('active', '1') ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Create Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
