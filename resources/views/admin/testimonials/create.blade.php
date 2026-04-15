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
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Name and Rating Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Client Name *</label>
                        <input type="text" name="name" required
                               value="{{ old('name') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Rating *</label>
                        <select name="rating" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Position (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Position (English)</label>
                        <input type="text" name="position[en]"
                               value="{{ old('position.en') }}"
                               placeholder="e.g. CEO"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Position (Arabic)</label>
                        <input type="text" name="position[ar]" dir="rtl"
                               value="{{ old('position.ar') }}"
                               placeholder="المنصب..."
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                    </div>
                </div>

                <!-- Company (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company (English)</label>
                        <input type="text" name="company[en]"
                               value="{{ old('company.en') }}"
                               placeholder="e.g. Acme Corp"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Company (Arabic)</label>
                        <input type="text" name="company[ar]" dir="rtl"
                               value="{{ old('company.ar') }}"
                               placeholder="الشركة..."
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">
                    </div>
                </div>

                <!-- Content (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Content (English) *</label>
                        <textarea name="content[en]" rows="4" required
                                  placeholder="What the client said in English..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">{{ old('content.en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Testimonial Content (Arabic) *</label>
                        <textarea name="content[ar]" rows="4" required dir="rtl"
                                  placeholder="ما قاله العميل باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary text-right">{{ old('content.ar') }}</textarea>
                    </div>
                </div>

                <!-- Image and Status Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Client Image</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    </div>
                    <div class="flex items-center gap-6 pb-2">
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

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="order" min="0" value="{{ old('order', 0) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-primary text-white rounded-lg hover-bg-primary transition-colors">
                    Create Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection



