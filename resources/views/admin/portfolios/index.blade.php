@extends('admin.layouts.app')

@section('title', __('Portfolio'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Portfolio') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('Manage your showcase projects') }}</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover-bg-primary transition-colors">
            <span class="material-icons">add</span>
            {{ __('Add Project') }}
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Search') }}</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search projects...') }}" 
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
                <a href="{{ route('admin.portfolios.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2 flex items-center">
                    {{ __('Clear') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Portfolio Table -->
    <x-admin.table :headers="[__('Project'), __('Client/Date'), __('Status'), __('Order')]" :items="$portfolios">
        @foreach($portfolios as $portfolio)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-start gap-4">
                        @if($portfolio->thumbnail)
                            <img src="{{ $portfolio->thumbnail_url }}" alt="{{ $portfolio->title }}" 
                                 class="w-20 h-14 rounded-lg object-cover shadow-sm border border-gray-100">
                        @else
                            <div class="w-20 h-14 rounded-lg bg-yellow-50 text-yellow-500 flex items-center justify-center border border-yellow-100">
                                <span class="material-icons">work</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 leading-tight">{{ $portfolio->title }}</div>
                            <div class="text-xs text-primary font-semibold mt-1">{{ $portfolio->category }}</div>
                            <div class="text-[10px] text-muted mt-0.5 font-mono">{{ $portfolio->slug }}</div>
                            <div class="text-[10px] text-gray-500 mt-1 line-clamp-1 border-t border-gray-100 pt-1">{{ Str::limit(strip_tags($portfolio->description), 60) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900">{{ $portfolio->client ?? __('Internal Project') }}</div>
                    <div class="text-xs text-gray-500 mt-1">
                        @if($portfolio->completed_date)
                            <span class="flex items-center gap-1">
                                <span class="material-icons text-[10px]">event</span>
                                {{ $portfolio->completed_date->format('M Y') }}
                            </span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        @if($portfolio->featured)
                            <x-admin.status-badge type="featured" :value="true" />
                        @endif
                        <x-admin.status-badge type="active" :value="$portfolio->active" />
                    </div>
                </td>
                <td class="px-6 py-4 text-sm font-bold text-gray-600">
                    #{{ $portfolio->order }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                           class="group p-2 rounded-lg hover:bg-amber-50 text-amber-600 transition-all border border-transparent hover:border-amber-100" title="{{ __('Edit') }}">
                            <span class="material-icons text-lg">drive_file_rename_outline</span>
                        </a>
                        
                        <button onclick="toggleFeatured('portfolios', {{ $portfolio->id }})" 
                                class="group p-2 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-all border border-transparent hover:border-yellow-100" 
                                title="{{ $portfolio->featured ? __('Unfeature') : __('Feature') }}">
                            <span class="material-icons text-lg">{{ $portfolio->featured ? 'auto_awesome' : 'auto_awesome_motion' }}</span>
                        </button>
                        
                        <button onclick="toggleActive('portfolios', {{ $portfolio->id }})" 
                                class="group p-2 rounded-lg hover:bg-emerald-50 text-emerald-600 transition-all border border-transparent hover:border-emerald-100" 
                                title="{{ $portfolio->active ? __('Deactivate') : __('Activate') }}">
                            <span class="material-icons text-lg">{{ $portfolio->active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" 
                              onsubmit="return confirm('{{ __('Are you sure you want to delete this project?') }}')" class="inline">
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






