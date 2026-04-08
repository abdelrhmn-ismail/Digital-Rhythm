@extends('admin.layouts.app')

@section('title', __('Contact Messages'))

@section('content')
<div class="px-6 py-6 font-sans">
    <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-black text-gray-900 tracking-tight">{{ __('Contact Messages') }}</h1>
            <p class="text-sm text-gray-400">{{ __('Manage inquiries from your website') }}</p>
        </div>
        <div class="flex gap-2">
            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded text-xs font-bold ring-1 ring-blue-100">{{ __('0 Total') }}</span>
        </div>
    </div>
    
    <x-admin.table :headers="['Sender Info', 'Message Snippet', 'Status', 'Date']" :items="collect([])">
    </x-admin.table>
</div>
@endsection
