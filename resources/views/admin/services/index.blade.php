@extends('admin.layouts.app')

@section('title', __('Services'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Services') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('Manage your professional services') }}</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary transition-colors">
            <span class="material-icons">add</span>
            {{ __('Add Service') }}
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Search') }}</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search services...') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Category') }}</label>
                <select name="category" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
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
                <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2 flex items-center">
                    {{ __('Clear') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Services Table -->
    <x-admin.table :headers="[__('Service'), __('Details'), __('Status'), __('Order')]" :items="$services">
        @foreach($services as $service)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary flex items-center justify-center border border-primary/20 flex-shrink-0">
                            <span class="material-icons text-2xl">{{ $service->icon ?? 'home_repair_service' }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 leading-tight">{{ $service->title }}</div>
                            <div class="text-xs text-primary font-semibold mt-1">{{ $service->category }}</div>
                            <div class="text-[10px] text-muted mt-0.5 font-mono">{{ $service->slug }}</div>
                            <div class="text-[10px] text-gray-500 mt-1 line-clamp-1 border-t border-gray-100 pt-1">{{ Str::limit(strip_tags($service->description), 60) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900">{{ $service->client ?? __('Standard Service') }}</div>
                    <div class="text-xs text-gray-500 mt-1">
                        @if($service->price)
                            <span class="flex items-center gap-1">
                                <span class="material-icons text-[10px]">payments</span>
                                {{ $service->price }} {{ $service->price_type }}
                            </span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        @if($service->featured)
                            <x-admin.status-badge type="featured" :value="true" />
                        @endif
                        <x-admin.status-badge type="active" :value="$service->active" />
                    </div>
                </td>
                <td class="px-6 py-4 text-sm font-bold text-gray-600">
                    #{{ $service->order }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.services.edit', $service) }}" 
                           class="group p-2 rounded-lg hover:bg-amber-50 text-amber-600 transition-all border border-transparent hover:border-amber-100" title="{{ __('Edit') }}">
                            <span class="material-icons text-lg">drive_file_rename_outline</span>
                        </a>
                        
                        <button onclick="toggleFeatured('services', {{ $service->id }})" 
                                class="group p-2 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-all border border-transparent hover:border-yellow-100" 
                                title="{{ $service->featured ? __('Unfeature') : __('Feature') }}">
                            <span class="material-icons text-lg">{{ $service->featured ? 'auto_awesome' : 'auto_awesome_motion' }}</span>
                        </button>
                        
                        <button onclick="toggleActive('services', {{ $service->id }})" 
                                class="group p-2 rounded-lg hover:bg-emerald-50 text-emerald-600 transition-all border border-transparent hover:border-emerald-100" 
                                title="{{ $service->active ? __('Deactivate') : __('Activate') }}">
                            <span class="material-icons text-lg">{{ $service->active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" 
                               onsubmit="return confirm('{{ __('Are you sure you want to delete this service?') }}')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group p-2 rounded-lg hover:bg-rose-50 text-rose-600 transition-all border border-transparent hover:border-rose-100" title="{{ __('Delete') }}">
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
