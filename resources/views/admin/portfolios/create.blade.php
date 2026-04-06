@extends('admin.layouts.app')

@section('title', 'Create Portfolio Item')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-2">
            <a href="{{ route('admin.portfolios.index') }}" class="hover:text-gray-900">Portfolio</a>
            <span>/</span>
            <span>Create</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900">Create Portfolio Item</h1>
        <p class="text-gray-600 mt-1">Add a new project to your portfolio</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Title (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title[en]" required
                               value="{{ old('title.en') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (Arabic) *</label>
                        <input type="text" name="title[ar]" required dir="rtl"
                               value="{{ old('title.ar') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                    </div>
                </div>

                <!-- Slug and Category Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug (URL)</label>
                        <input type="text" name="slug"
                               value="{{ old('slug') }}"
                               placeholder="auto-generated from English title"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Client (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Client Name (English)</label>
                        <input type="text" name="client[en]"
                               value="{{ old('client.en') }}"
                               placeholder="e.g. Acme Corp"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Client Name (Arabic)</label>
                        <input type="text" name="client[ar]" dir="rtl"
                               value="{{ old('client.ar') }}"
                               placeholder="اسم العميل..."
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                    </div>
                </div>

                <!-- Date and Project URL -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Completion Date</label>
                        <input type="date" name="completed_date"
                               value="{{ old('completed_date') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Project URL</label>
                        <input type="url" name="project_url"
                               value="{{ old('project_url') }}"
                               placeholder="https://example.com"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Description (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (English) *</label>
                        <textarea name="description[en]" rows="3" required
                                  placeholder="Brief description in English..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description.en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabic) *</label>
                        <textarea name="description[ar]" rows="3" required dir="rtl"
                                  placeholder="وصف مختصر باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">{{ old('description.ar') }}</textarea>
                    </div>
                </div>

                <!-- Content (EN/AR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Content (English)</label>
                        <textarea name="content[en]" rows="6"
                                  placeholder="Full description in English..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content.en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Content (Arabic)</label>
                        <textarea name="content[ar]" rows="6" dir="rtl"
                                  placeholder="الوصف الكامل باللغة العربية..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">{{ old('content.ar') }}</textarea>
                    </div>
                </div>

                <!-- Images Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail Image</label>
                        <input type="file" name="thumbnail" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Main preview image (max 2MB)</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gallery Images</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Multiple images allowed</p>
                    </div>
                </div>

                <!-- Technologies Selection -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Technologies Used (EN / AR)</label>
                    <div id="technologies-container" class="space-y-4">
                        <div class="flex flex-col md:flex-row gap-4 items-start bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <div class="flex-1 w-full">
                                <input type="text" name="technologies[en][]" placeholder="Technology (e.g. Laravel)"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="flex-1 w-full">
                                <input type="text" name="technologies[ar][]" placeholder="التقنية (مثلاً: لارافل)" dir="rtl"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                            </div>
                            <button type="button" onclick="addTechnology()" class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                <span class="material-icons">add</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status Options -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                        <input type="number" name="order" min="0" value="{{ old('order', 0) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex items-center gap-6 pb-2">
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
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.portfolios.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Create Portfolio Item
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function addTechnology() {
    const container = document.getElementById('technologies-container');
    const newRow = document.createElement('div');
    newRow.className = 'flex flex-col md:flex-row gap-4 items-start bg-gray-50 p-4 rounded-lg border border-gray-100';
    newRow.innerHTML = `
        <div class="flex-1 w-full">
            <input type="text" name="technologies[en][]" placeholder="Technology (English)"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="flex-1 w-full">
            <input type="text" name="technologies[ar][]" placeholder="التقنية باللغة العربية" dir="rtl"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
        </div>
        <button type="button" onclick="removeRow(this)" class="px-3 py-2 bg-red-200 text-red-700 rounded-lg hover:bg-red-300">
            <span class="material-icons">remove</span>
        </button>
    `;
    container.appendChild(newRow);
}

function removeRow(button) {
    button.parentElement.remove();
}
</script>
@endsection
