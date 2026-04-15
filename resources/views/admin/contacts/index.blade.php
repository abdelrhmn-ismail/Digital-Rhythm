@extends('admin.layouts.app')

@section('title', __('Contact Messages'))

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 rounded-2xl bg-white p-6 shadow-sm border border-gray-100 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-black text-gray-900 tracking-tight">{{ __('Contact Messages') }}</h1>
            <p class="text-sm text-muted">{{ __('Manage inquiries from your website visitors.') }}</p>
        </div>
        <div class="flex flex-wrap gap-3 text-xs font-semibold">
            <span class="rounded-full bg-indigo-50 px-3 py-1 text-indigo-600">{{ $stats['total'] }} {{ __('Total') }}</span>
            <span class="rounded-full bg-amber-50 px-3 py-1 text-amber-600">{{ $stats['unread'] }} {{ __('Unread') }}</span>
            <a href="{{ route('admin.contacts.export', request()->query()) }}" class="inline-flex items-center gap-2 rounded-full border border-gray-200 px-3 py-1 text-gray-600 hover:text-gray-900">
                <span class="material-icons text-base">file_download</span>{{ __('Export CSV') }}
            </a>
        </div>
    </div>

    <form method="GET" class="grid gap-4 rounded-2xl bg-white p-4 shadow-sm border border-gray-100 md:grid-cols-4">
        <div class="md:col-span-2">
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ __('Search') }}</label>
            <input type="text" name="search" value="{{ $filters['search'] ?? ' }}" placeholder="{{ __('Search by name, email or message') }}" class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-primary focus:outline-none" />
        </div>
        <div>
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ __('Status') }}</label>
            <select name="status" class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-primary focus:outline-none">
                <option value="">{{ __('All') }}</option>
                <option value="unread" @selected(($filters['status'] ?? ') === 'unread')>{{ __('Unread') }}</option>
                <option value="read" @selected(($filters['status'] ?? ') === 'read')>{{ __('Read') }}</option>
            </select>
        </div>
        <div>
            <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ __('Received') }}</label>
            <select name="date" class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-primary focus:outline-none">
                <option value="">{{ __('Anytime') }}</option>
                <option value="today" @selected(($filters['date'] ?? ') === 'today')>{{ __('Today') }}</option>
                <option value="week" @selected(($filters['date'] ?? ') === 'week')>{{ __('Last 7 days') }}</option>
                <option value="month" @selected(($filters['date'] ?? ') === 'month')>{{ __('Last 30 days') }}</option>
            </select>
        </div>
        <div class="flex items-end justify-end gap-2 md:col-span-4">
            <a href="{{ route('admin.contacts.index') }}" class="rounded-lg border border-gray-200 px-4 py-2 text-sm text-gray-500">{{ __('Reset') }}</a>
            <button type="submit" class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white">{{ __('Filter') }}</button>
        </div>
    </form>

    <x-admin.table :headers="[__('Sender'), __('Message Snippet'), __('Status'), __('Created'), __('Replies')]" :items="$messages">
        @forelse($messages as $message)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm">
                    <p class="font-semibold text-gray-900">{{ $message->name }}</p>
                    <p class="text-gray-500 text-xs">{{ $message->email }}</p>
                    <p class="text-muted text-xs">{{ $message->company ?? __('No Company') }}</p>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ \Illuminate\Support\Str::limit($message->message, 120) }}
                </td>
                <td class="px-6 py-4 text-sm">
                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $message->is_read ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                        <span class="material-icons text-base">{{ $message->is_read ? 'mark_email_read' : 'mark_email_unread' }}</span>
                        {{ $message->is_read ? __('Read') : __('Unread') }}
                    </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $message->created_at?->format('M d, Y H:i') }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">
                    @if($message->replied_at)
                        <span class="text-green-600 flex items-center gap-1 text-xs">
                            <span class="material-icons text-base">reply</span>
                            {{ $message->replied_at->diffForHumans() }}
                        </span>
                    @else
                        <span class="text-muted text-xs">{{ __('No reply yet') }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.contacts.show', $message) }}" class="rounded-full border border-gray-200 px-3 py-1 text-xs text-gray-600 hover:text-gray-900">{{ __('Open') }}</a>
                        @if($message->is_read)
                            <form method="POST" action="{{ route('admin.contacts.mark-unread', $message) }}">
                                @csrf
                                <button type="submit" class="rounded-full border border-gray-200 px-3 py-1 text-xs text-gray-600 hover:text-gray-900">{{ __('Mark Unread') }}</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.contacts.mark-read', $message) }}">
                                @csrf
                                <button type="submit" class="rounded-full border border-gray-200 px-3 py-1 text-xs text-gray-600 hover:text-gray-900">{{ __('Mark Read') }}</button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('admin.contacts.destroy', $message) }}" onsubmit="return confirm('{{ __('Delete this message? This cannot be undone.') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full border border-red-200 px-3 py-1 text-xs text-red-600 hover:text-red-800">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-sm text-muted">{{ __('No messages found for the selected filters.') }}</td>
            </tr>
        @endforelse
    </x-admin.table>
</div>
@endsection



