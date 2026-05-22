@extends('admin.layouts.app')

@section('title', __('Projects'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Projects') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('Manage your showcased projects portfolio') }}</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary transition-colors">
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
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Service') }}</label>
                <select name="service_id" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
                    <option value="">{{ __('All Services') }}</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ request('service_id') == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Featured') }}</label>
                <select name="featured" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
                    <option value="">{{ __('All') }}</option>
                    <option value="true" {{ request('featured') === 'true' ? 'selected' : '' }}>{{ __('Featured Only') }}</option>
                    <option value="false" {{ request('featured') === 'false' ? 'selected' : '' }}>{{ __('Not Featured') }}</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Active') }}</label>
                <select name="active" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary">
                    <option value="">{{ __('All') }}</option>
                    <option value="true" {{ request('active') === 'true' ? 'selected' : '' }}>{{ __('Active Only') }}</option>
                    <option value="false" {{ request('active') === 'false' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                </select>
            </div>
            
            <div class="flex gap-4">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary transition-colors">
                    {{ __('Filter') }}
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2 flex items-center">
                    {{ __('Clear') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Projects Table -->
    <x-admin.table :headers="[__('Project'), __('Associated Service'), __('Client & Details'), __('Status'), __('Order')]" :items="$projects">
        @foreach($projects as $project)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-12 rounded-lg bg-gray-100 flex-shrink-0 overflow-hidden border border-gray-200">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-primary/10 text-primary flex items-center justify-center">
                                    <span class="material-icons">folder_special</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 leading-tight">{{ $project->title }}</div>
                            <div class="text-[10px] text-gray-500 mt-1 line-clamp-1 border-t border-gray-100 pt-1">
                                {!! Str::limit(strip_tags($project->description), 80) !!}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    @if($project->service)
                        <div class="text-sm font-bold text-gray-900">{{ $project->service->title }}</div>
                        <div class="text-xs text-primary font-semibold mt-0.5">{{ $project->service->category }}</div>
                    @else
                        <span class="text-xs text-gray-400 font-medium italic">{{ __('Unassigned') }}</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-900">{{ $project->client ?? __('General Client') }}</div>
                    <div class="text-[10px] text-gray-500 mt-1 font-mono">
                        @if($project->completed_date)
                            <span class="flex items-center gap-1">
                                <span class="material-icons text-[10px]">event</span>
                                {{ $project->completed_date->format('Y-m-d') }}
                            </span>
                        @endif
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="flex items-center gap-1 text-primary hover:underline mt-0.5">
                                <span class="material-icons text-[10px]">link</span>
                                {{ __('Live Link') }}
                            </a>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                        @if($project->is_featured)
                            <x-admin.status-badge type="featured" :value="true" />
                        @endif
                        <x-admin.status-badge type="active" :value="$project->is_active" />
                    </div>
                </td>
                <td class="px-6 py-4 text-sm font-bold text-gray-600">
                    #{{ $project->order }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.projects.edit', $project) }}" 
                           class="group p-2 rounded-lg hover:bg-amber-50 text-amber-600 transition-all border border-transparent hover:border-amber-100" title="{{ __('Edit') }}">
                            <span class="material-icons text-lg">drive_file_rename_outline</span>
                        </a>
                        
                        <button onclick="toggleFeatured('projects', {{ $project->id }})" 
                                class="group p-2 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-all border border-transparent hover:border-yellow-100" 
                                title="{{ $project->is_featured ? __('Unfeature') : __('Feature') }}">
                            <span class="material-icons text-lg">{{ $project->is_featured ? 'auto_awesome' : 'auto_awesome_motion' }}</span>
                        </button>
                        
                        <button onclick="toggleActive('projects', {{ $project->id }})" 
                                class="group p-2 rounded-lg hover:bg-emerald-50 text-emerald-600 transition-all border border-transparent hover:border-emerald-100" 
                                title="{{ $project->is_active ? __('Deactivate') : __('Activate') }}">
                            <span class="material-icons text-lg">{{ $project->is_active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" 
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
