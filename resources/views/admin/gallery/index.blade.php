@extends('admin.layouts.app')

@section('title', __('Gallery'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Gallery') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('Manage your image gallery') }}</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover-bg-primary transition-colors">
            <span class="material-icons">add</span>
            {{ __('Add Image') }}
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">{{ __('Total Images') }}</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
                </div>
                <span class="material-icons text-4xl text-primary">photo_library</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">{{ __('Active Images') }}</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['active'] }}</p>
                </div>
                <span class="material-icons text-4xl text-green-600">check_circle</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Search') }}</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search images...') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Category') }}</label>
                <select name="category" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
                    <option value="">{{ __('All Categories') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary transition-colors">
                    {{ __('Filter') }}
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2 flex items-center">
                    {{ __('Clear') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse($galleryImages as $image)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden group hover:shadow-md transition-shadow">
                <!-- Image -->
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    <img src="{{ $image->image_url }}" alt="{{ $image->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <!-- Overlay Actions -->
                    <div class="absolute inset-0 bg-surface bg-opacity-0 group-hover:bg-opacity-40 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $image) }}" 
                               class="p-2 bg-white rounded-lg hover:bg-gray-100" title="{{ __('Edit') }}">
                                <span class="material-icons text-amber-600">edit</span>
                            </a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" 
                                  onsubmit="return confirm('{{ __('Are you sure?') }}')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-white rounded-lg hover:bg-gray-100" title="{{ __('Delete') }}">
                                    <span class="material-icons text-red-600">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Badges -->
                    <div class="absolute top-2 right-2 flex flex-col gap-1">
                        @if($image->is_featured)
                            <span class="bg-yellow-400 text-white text-xs px-2 py-1 rounded-full flex items-center gap-1">
                                <span class="material-icons text-sm">auto_awesome</span>
                                {{ __('Featured') }}
                            </span>
                        @endif
                        @if(!$image->is_active)
                            <span class="bg-primary text-white text-xs px-2 py-1 rounded-full">
                                {{ __('Inactive') }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Info -->
                <div class="p-3">
                    <h3 class="font-semibold text-gray-900 text-sm truncate">{{ $image->title ?: __('Untitled') }}</h3>
                    @if($image->category)
                        <p class="text-xs text-primary font-medium mt-1">{{ $image->category }}</p>
                    @endif
                    <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                        <span>{{ __('Order') }}: #{{ $image->order }}</span>
                        <div class="flex gap-1">
                            <button onclick="toggleFeatured('gallery', {{ $image->id }})" 
                                    class="p-1 hover:bg-yellow-50 rounded text-yellow-600"
                                    title="{{ $image->is_featured ? __('Unfeature') : __('Feature') }}">
                                <span class="material-icons text-sm">{{ $image->is_featured ? 'auto_awesome' : 'auto_awesome_motion' }}</span>
                            </button>
                            <button onclick="toggleActive('gallery', {{ $image->id }})" 
                                    class="p-1 hover:bg-green-50 rounded text-green-600"
                                    title="{{ $image->is_active ? __('Deactivate') : __('Activate') }}">
                                <span class="material-icons text-sm">{{ $image->is_active ? 'visibility' : 'visibility_off' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded-lg border border-gray-200">
                <span class="material-icons text-6xl text-gray-300">photo_library</span>
                <p class="text-gray-500 mt-4">{{ __('No gallery images found') }}</p>
                <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 mt-4 bg-primary text-white px-4 py-2 rounded-lg hover-bg-primary">
                    <span class="material-icons">add</span>
                    {{ __('Add Your First Image') }}
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $galleryImages->links() }}
    </div>
</div>

@endsection






