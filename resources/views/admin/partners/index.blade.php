@extends('admin.layouts.app')

@section('title', __('Partners'))

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Partners') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('Manage your strategic partners and logos (PNG only recommended)') }}</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover-bg-primary transition-colors">
            <span class="material-icons">add</span>
            {{ __('Add Partner') }}
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Search') }}</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search partners...') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus-ring-primary focus-ring-primary">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary transition-colors">
                    {{ __('Filter') }}
                </button>
                <a href="{{ route('admin.partners.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2 flex items-center">
                    {{ __('Clear') }}
                </a>
            </div>
        </form>
    </div>

    <!-- Partners Table -->
    <x-admin.table :headers="[__('Logo/Name'), __('Status'), __('Order')]" :items="$partners">
        @foreach($partners as $partner)
            <tr class="hover:bg-gray-50 transition-all duration-200">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        @if($partner->logo_path)
                            <div class="w-20 h-14 bg-gray-50 rounded-lg p-2 flex items-center justify-center border border-gray-100">
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" 
                                     class="max-w-full max-h-full object-contain">
                            </div>
                        @else
                            <div class="w-20 h-14 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center border border-blue-100">
                                <span class="material-icons">business</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <div class="font-bold text-gray-900 leading-tight">{{ $partner->name }}</div>
                            <div class="text-[10px] text-muted mt-0.5 font-mono uppercase tracking-wider">{{ __('Added') }}: {{ $partner->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <x-admin.status-badge type="active" :value="$partner->is_active" />
                </td>
                <td class="px-6 py-4 text-sm font-bold text-gray-600">
                    #{{ $partner->order }}
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.partners.edit', $partner) }}" 
                           class="group p-2 rounded-lg hover:bg-amber-50 text-amber-600 transition-all border border-transparent hover:border-amber-100" title="{{ __('Edit') }}">
                            <span class="material-icons text-lg">drive_file_rename_outline</span>
                        </a>
                        
                        <button onclick="toggleActive('partners', {{ $partner->id }})" 
                                class="group p-2 rounded-lg hover:bg-emerald-50 text-emerald-600 transition-all border border-transparent hover:border-emerald-100" 
                                title="{{ $partner->is_active ? __('Deactivate') : __('Activate') }}">
                            <span class="material-icons text-lg">{{ $partner->is_active ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                        
                        <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}" 
                              onsubmit="return confirm('{{ __('Are you sure you want to delete this partner?') }}')" class="inline">
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
