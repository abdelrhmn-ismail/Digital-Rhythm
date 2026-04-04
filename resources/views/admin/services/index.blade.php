@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Services</h1>
            <p class="text-gray-600 mt-1">Manage your service offerings</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <span class="material-icons">add</span>
            Add Service
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search services..." 
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
            
            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2">
                Clear
            </a>
        </form>
    </div>

    <!-- Services Table -->
    <x-admin.table :headers="['Service', 'Price Info', 'Status', 'Order']" :items="$services">
        @foreach($services as $service)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-start gap-4">
                        @if($service->image)
                            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" 
                                 class="w-14 h-14 rounded-xl object-cover shadow-sm border border-gray-100">
                        @else
                            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center border border-blue-100">
                                <span class="material-icons">{{ $service->icon ?? 'business_center' }}</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 leading-tight">{{ $service->title }}</div>
                            <div class="text-xs text-gray-400 mt-0.5 font-mono">{{ $service->slug }}</div>
                            <div class="text-xs text-gray-500 mt-1 line-clamp-1">{{ Str::limit($service->description, 60) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    @if($service->price)
                        <div class="text-sm font-bold text-gray-900">{{ number_format($service->price, 0) }} SAR</div>
                        <div class="text-[10px] uppercase tracking-wider font-bold text-gray-400">{{ $service->price_type }}</div>
                    @else
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-0.5 rounded">Custom Quote</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        @if($service->featured)
                            <x-admin.status-badge type="featured" :value="true" />
                        @endif
                        <x-admin.status-badge type="active" :value="$service->active" />
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="text-sm font-semibold text-gray-600">#{{ $service->order }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.services.edit', $service) }}" 
                           class="group p-2 rounded-lg hover:bg-indigo-50 text-indigo-600 transition-all border border-transparent hover:border-indigo-100" title="Edit">
                            <span class="material-icons text-lg">edit_note</span>
                        </a>
                        
                        <button onclick="toggleFeatured('services', {{ $service->id }})" 
                                class="group p-2 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-all border border-transparent hover:border-yellow-100" 
                                title="{{ $service->featured ? 'Unfeature' : 'Feature' }}">
                            <span class="material-icons text-lg">{{ $service->featured ? 'auto_awesome' : 'auto_awesome_motion' }}</span>
                        </button>
                        
                        <button onclick="toggleActive('services', {{ $service->id }})" 
                                class="group p-2 rounded-lg hover:bg-emerald-50 text-emerald-600 transition-all border border-transparent hover:border-emerald-100" 
                                title="{{ $service->active ? 'Deactivate' : 'Activate' }}">
                            <span class="material-icons text-lg">{{ $service->active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this service?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group p-2 rounded-lg hover:bg-rose-50 text-rose-600 transition-all border border-transparent hover:border-rose-100" title="Delete">
                                <span class="material-icons text-lg">delete_sweep</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>
</div>
@endsection
