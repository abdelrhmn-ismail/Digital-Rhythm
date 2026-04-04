@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Testimonials</h1>
            <p class="text-gray-600 mt-1">Manage customer testimonials and reviews</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <span class="material-icons">add</span>
            Add Testimonial
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search testimonials..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Featured</label>
                <select name="featured" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All</option>
                    <option value="true" {{ request('featured') === 'true' ? 'selected' : '' }}>Featured</option>
                    <option value="false" {{ request('featured') === 'false' ? 'selected' : '' }}>Not Featured</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="active" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All</option>
                    <option value="true" {{ request('active') === 'true' ? 'selected' : '' }}>Active</option>
                    <option value="false" {{ request('active') === 'false' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                Filter
            </button>
            
            <a href="{{ route('admin.testimonials.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2">
                Clear
            </a>
        </form>
    </div>

    <!-- Testimonials Table -->
    <x-admin.table :headers="['Testimonial', 'Client Info', 'Rating', 'Status', 'Order']" :items="$testimonials">
        @foreach($testimonials as $testimonial)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-start gap-3">
                        @if($testimonial->image)
                            <img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}" 
                                 class="w-12 h-12 rounded-full object-cover shadow-sm">
                        @else
                            <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold">
                                {{ substr($testimonial->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">{{ $testimonial->name }}</div>
                            <div class="text-sm text-gray-500 mt-1 line-clamp-1 italic">"{{ Str::limit($testimonial->content, 80) }}"</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm">
                        <div class="font-medium text-gray-900">{{ $testimonial->position }}</div>
                        <div class="text-gray-500">{{ $testimonial->company }}</div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex text-yellow-500">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-icons text-xs">{{ $i <= $testimonial->rating ? 'star' : 'star_outline' }}</span>
                            @endfor
                        </div>
                        <span class="ml-2 text-xs font-semibold text-gray-600">{{ $testimonial->rating }}</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        @if($testimonial->featured)
                            <x-admin.status-badge type="featured" :value="true" />
                        @endif
                        <x-admin.status-badge type="active" :value="$testimonial->active" />
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="text-sm font-medium text-gray-600">#{{ $testimonial->order }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                           class="group p-2 rounded-lg hover:bg-blue-50 text-blue-600 transition-all border border-transparent hover:border-blue-100" title="Edit">
                            <span class="material-icons text-lg">edit</span>
                        </a>
                        
                        <button onclick="toggleFeatured('testimonials', {{ $testimonial->id }})" 
                                class="group p-2 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-all border border-transparent hover:border-yellow-100" 
                                title="{{ $testimonial->featured ? 'Unfeature' : 'Feature' }}">
                            <span class="material-icons text-lg">{{ $testimonial->featured ? 'stars' : 'star_outline' }}</span>
                        </button>
                        
                        <button onclick="toggleActive('testimonials', {{ $testimonial->id }})" 
                                class="group p-2 rounded-lg hover:bg-green-50 text-green-600 transition-all border border-transparent hover:border-green-100" 
                                title="{{ $testimonial->active ? 'Deactivate' : 'Activate' }}">
                            <span class="material-icons text-lg">{{ $testimonial->active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this testimonial?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group p-2 rounded-lg hover:bg-red-50 text-red-600 transition-all border border-transparent hover:border-red-100" title="Delete">
                                <span class="material-icons text-lg">delete_outline</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>
</div>
@endsection
