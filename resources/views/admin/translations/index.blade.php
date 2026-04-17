@extends('admin.layouts.app')

@section('title', __('Manage Translations'))

@section('content')
<div class="space-y-6" x-data>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('Translations') }}</h1>
            <p class="text-sm text-gray-500">{{ __('Manage your website localization across all supported languages') }}</p>
        </div>
        
        <button type="button" @click="$dispatch('open-modal', 'add-translation')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-bold rounded-xl text-white bg-primary hover:bg-primary/90 transition-all active:scale-95 shadow-sm">
            <span class="material-icons text-sm mr-1.5">add</span>
            {{ __('Add Translation') }}
        </button>
    </div>

    <!-- Search & Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="md:col-span-3 bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
            <form action="{{ route('admin.translations.index') }}" method="GET" class="relative group">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 group-focus-within:text-primary transition-colors">
                    <span class="material-icons text-xl">search</span>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" 
                    class="block w-full pl-11 pr-4 py-2.5 bg-gray-50 border-transparent rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all" 
                    placeholder="{{ __('Search translations by key or value...') }}">
                @if(request('search'))
                    <a href="{{ route('admin.translations.index') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-red-500 transition-colors">
                        <span class="material-icons text-sm">close</span>
                    </a>
                @endif
            </form>
        </div>
        <div class="bg-primary/5 rounded-2xl p-4 border border-primary/10 flex flex-col justify-center items-center text-center">
            <span class="text-2xl font-black text-primary">{{ $translations->total() }}</span>
            <span class="text-[10px] font-bold text-primary/60 uppercase tracking-wider">{{ __('Total Keys') }}</span>
        </div>
    </div>

    <!-- Translations Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-wider text-gray-400 w-1/4">{{ __('Translation Key') }}</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-wider text-gray-400 w-1/3">{{ __('English Content') }}</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-wider text-gray-400 w-1/3 text-right">{{ __('Arabic Content') }}</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-wider text-gray-400 text-center w-24">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($translations as $translation)
                        <tr class="group hover:bg-gray-50/50 transition-colors" x-data="{ editing: false, en: '{{ addslashes($translation->en) }}', ar: '{{ addslashes($translation->ar) }}' }">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-gray-900 font-mono break-all">{{ $translation->key }}</span>
                                    <span class="text-[9px] text-gray-400 uppercase tracking-tighter mt-1">{{ __('Key Reference') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 leading-relaxed">
                                <div x-show="!editing" class="min-h-[1.5rem] line-clamp-3">
                                    {!! $translation->en ?: '<span class="italic text-gray-300">'.__('No translation').'</span>' !!}
                                </div>
                                <div x-show="editing" x-cloak>
                                    <textarea id="en-{{ $translation->id }}" class="w-full px-4 py-3 rounded-xl border-gray-200 text-sm focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all outline-none bg-gray-50/50 min-h-[100px] shadow-inner font-medium">{{ $translation->en }}</textarea>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 leading-relaxed text-right" dir="rtl">
                                <div x-show="!editing" class="min-h-[1.5rem] line-clamp-3 font-alexandria">
                                    {!! $translation->ar ?: '<span class="italic text-gray-300">'.__('No translation').'</span>' !!}
                                </div>
                                <div x-show="editing" x-cloak>
                                    <textarea id="ar-{{ $translation->id }}" class="w-full px-4 py-3 rounded-xl border-gray-200 text-sm focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all text-right outline-none bg-gray-50/50 min-h-[100px] shadow-inner font-alexandria font-medium">{{ $translation->ar }}</textarea>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button x-show="!editing" @click="editing = true" class="w-9 h-9 rounded-xl flex items-center justify-center bg-gray-100 text-gray-400 hover:bg-primary/10 hover:text-primary transition-all active:scale-90" title="{{ __('Edit') }}">
                                        <span class="material-icons text-lg">edit_note</span>
                                    </button>
                                    
                                    <button x-show="editing" @click="saveTranslation({{ $translation->id }}, 'en-{{ $translation->id }}', 'ar-{{ $translation->id }}'); editing = false;" class="w-9 h-9 rounded-xl flex items-center justify-center bg-green-50 text-green-500 hover:bg-green-100 transition-all active:scale-90" title="{{ __('Save') }}">
                                        <span class="material-icons text-lg">check</span>
                                    </button>

                                    <button x-show="editing" @click="editing = false" class="w-9 h-9 rounded-xl flex items-center justify-center bg-red-50 text-red-400 hover:bg-red-100 transition-all active:scale-90" title="{{ __('Cancel') }}">
                                        <span class="material-icons text-lg">close</span>
                                    </button>

                                    <button x-show="!editing" @click="deleteTranslation({{ $translation->id }})" class="w-9 h-9 rounded-xl flex items-center justify-center bg-gray-100 text-gray-400 hover:bg-red-50 hover:text-red-500 transition-all active:scale-90" title="{{ __('Delete') }}">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="material-icons text-5xl text-gray-200 mb-4">translate</span>
                                    <p class="text-gray-400 font-medium">{{ __('No translations found matching your search.') }}</p>
                                    @if(request('search'))
                                        <a href="{{ route('admin.translations.index') }}" class="mt-2 text-primary hover:underline text-sm font-bold">{{ __('Clear Search') }}</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($translations->hasPages())
            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100 font-alexandria">
                {{ $translations->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Add Translation Modal -->
<div x-data="{ open: false }" 
    @open-modal.window="if($event.detail === 'add-translation') { open = true; }" 
    x-show="open" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500/75 backdrop-blur-sm" @click="open = false"></div>

        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative z-10 inline-block overflow-hidden transition-all transform bg-white rounded-3xl shadow-xl sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
            <div class="px-6 py-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-900">{{ __('Add New Translation') }}</h3>
                <button @click="open = false" class="text-gray-400 hover:text-gray-500 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form action="{{ route('admin.translations.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-[10px] font-black uppercase tracking-wider text-gray-400 mb-2">{{ __('Key') }}</label>
                    <input type="text" name="key" required class="w-full px-4 py-3 rounded-2xl bg-gray-50 border-transparent focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm font-mono" placeholder="e.g. hero_welcome_message">
                    <p class="mt-2 text-[10px] text-gray-400 italic">{{ __('Use unique descriptive keys (avoid spaces, use underscores)') }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-wider text-gray-400 mb-2">{{ __('English Translation') }}</label>
                        <textarea id="new-en" name="en" required class="w-full px-4 py-3 rounded-2xl bg-gray-50 border-gray-200 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[120px] shadow-inner font-medium"></textarea>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-wider text-gray-400 mb-2 text-right">{{ __('Arabic Translation') }}</label>
                        <textarea id="new-ar" name="ar" required dir="rtl" class="w-full px-4 py-3 rounded-2xl bg-gray-50 border-gray-200 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-sm min-h-[120px] text-right font-alexandria shadow-inner font-medium"></textarea>
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="open = false" class="flex-1 px-6 py-3 rounded-2xl text-sm font-bold text-gray-500 bg-gray-100 hover:bg-gray-200 transition-all active:scale-95">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 rounded-2xl text-sm font-bold text-white bg-primary hover:bg-primary/90 transition-all active:scale-95 shadow-lg shadow-primary/20">
                        {{ __('Save Translation') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="delete-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script>
    function saveTranslation(id, enId, arId) {
        const enContent = document.getElementById(enId).value;
        const arContent = document.getElementById(arId).value;

        fetch(`/admin/translations/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                en: enContent,
                ar: arContent
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // We reload to show formatted content or just update the UI
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to save translation');
        });
    }

    function deleteTranslation(id) {
        if (confirm('{{ __("Are you sure you want to delete this translation?") }}')) {
            const form = document.getElementById('delete-form');
            form.action = `/admin/translations/${id}`;
            form.submit();
        }
    }
</script>
@endpush

@push('styles')
<style>
    [x-cloak] { display: none !important; }
    .font-alexandria { font-family: 'Alexandria', sans-serif !important; }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
