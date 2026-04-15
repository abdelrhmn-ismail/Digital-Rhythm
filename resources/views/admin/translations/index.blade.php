@extends('admin.layouts.app')

@section('title', __('Manage Translations'))

@section('content')
<div class="space-y-6">
    <!-- Add New Key -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-900">{{ __('Add New Key') }}</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.translations.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                @csrf
                <div>
                    <label for="key" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Key') }}</label>
                    <input type="text" name="key" id="key" required class="w-full px-4 py-2.5 rounded-xl border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/10 text-sm transition-all" placeholder="e.g. welcome_message">
                </div>
                <div>
                    <label for="en" class="block text-sm font-medium text-gray-700 mb-1">{{ __('English') }}</label>
                    <input type="text" name="en" id="en" required class="w-full px-4 py-2.5 rounded-xl border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/10 text-sm transition-all">
                </div>
                <div>
                    <label for="ar" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Arabic') }}</label>
                    <input type="text" name="ar" id="ar" required class="w-full px-4 py-2.5 rounded-xl border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/10 text-sm text-right transition-all" dir="rtl">
                </div>
                <div>
                    <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-bold rounded-xl text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors active:scale-95 shadow-sm">
                        <span class="material-icons text-sm mr-1.5">add</span>
                        {{ __('Add') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Translations List -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900">{{ __('Translations') }}</h2>
            <button type="submit" form="translations-form" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-bold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors active:scale-95 shadow-sm">
                <span class="material-icons text-sm mr-1.5">save</span>
                {{ __('Save All') }}
            </button>
        </div>
        <div class="overflow-x-auto">
            <form id="translations-form" action="{{ route('admin.translations.update') }}" method="POST">
                @csrf
                @method('PUT')
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">{{ __('Key') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">{{ __('English') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">{{ __('Arabic') }}</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider w-24">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($allKeys as $key)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 break-all">
                                {{ $key }}
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="en[{{ $key }}]" value="{{ $translations['en'][$key] ?? '' }}" class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/10 text-sm transition-all">
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="ar[{{ $key }}]" value="{{ $translations['ar'][$key] ?? '' }}" class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/10 text-sm text-right transition-all" dir="rtl">
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button type="button" onclick="deleteKey('{{ $key }}')" class="w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:text-white hover:bg-red-600 flex items-center justify-center transition-all mx-auto active:scale-95" title="{{ __('Delete') }}">
                                    <span class="material-icons text-base">delete</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Delete Form (Hidden) -->
<form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script>
    function deleteKey(key) {
        if (confirm('Are you sure you want to delete this translation key?')) {
            const form = document.getElementById('delete-form');
            form.action = `/admin/translations/${key}`;
            form.submit();
        }
    }
</script>
@endpush






