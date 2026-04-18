@extends('admin.layouts.app')

@section('title', __('Pages Management'))

@section('content')
<div class="max-w-7xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2">
                <span class="text-gray-400">{{ __('CONTENT') }}</span>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('STATIC PAGES') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Pages Management') }}</h1>
        </div>
    </div>

    <div class="bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-gray-400">{{ __('Page Title') }}</th>
                        <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-gray-400">{{ __('Slug') }}</th>
                        <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-gray-400">{{ __('Status') }}</th>
                        <th class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-gray-400 text-right">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr class="group hover:bg-gray-50/50 transition-colors">
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-gray-900">{{ $page->getTranslation('title', 'en') }}</span>
                                    <span class="text-[10px] text-gray-400 font-mono">{{ $page->getTranslation('title', 'ar') }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-xs font-mono text-gray-500">/{{ $page->slug }}</td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $page->is_active ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                    {{ $page->is_active ? __('Active') : __('Inactive') }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all">
                                    <span class="material-icons text-sm">edit</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
