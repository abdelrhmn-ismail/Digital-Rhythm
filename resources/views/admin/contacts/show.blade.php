@extends('admin.layouts.app')

@section('title', __('Contact Message'))

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-4">
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
            <div class="flex flex-wrap items-start justify-between gap-4 border-b border-gray-100 pb-4">
                <div>
                    <p class="text-sm text-gray-500">{{ __('From') }}</p>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $contact->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                    <p class="text-sm text-muted">{{ $contact->company ?? __('No company provided') }}</p>
                </div>
                <div class="text-right text-sm text-gray-500">
                    <p>{{ __('Received') }}</p>
                    <p class="font-semibold text-gray-900">{{ $contact->created_at?->format('M d, Y H:i') }}</p>
                    <p class="mt-2">
                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $contact->is_read ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                            <span class="material-icons text-base">{{ $contact->is_read ? 'mark_email_read' : 'mark_email_unread' }}</span>
                            {{ $contact->is_read ? __('Read') : __('Unread') }}
                        </span>
                    </p>
                </div>
            </div>
            <dl class="mt-4 space-y-2 text-sm text-gray-600">
                <div class="flex justify-between">
                    <dt class="text-gray-500">{{ __('Phone') }}</dt>
                    <dd>{{ $contact->phone ?? __('Not provided') }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">{{ __('Budget') }}</dt>
                    <dd>{{ $contact->budget ?? __('Not provided') }}</dd>
                </div>
            </dl>
            <div class="mt-6 rounded-2xl bg-gray-50 p-4 text-gray-700 leading-relaxed">
                {{ $contact->message }}
            </div>
            <div class="mt-6 flex flex-wrap gap-3">
                @if($contact->is_read)
                    <form method="POST" action="{{ route('admin.contacts.mark-unread', $contact) }}">
                        @csrf
                        <button type="submit" class="rounded-full border border-gray-200 px-4 py-2 text-xs font-semibold text-gray-600">{{ __('Mark unread') }}</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('admin.contacts.mark-read', $contact) }}">
                        @csrf
                        <button type="submit" class="rounded-full border border-gray-200 px-4 py-2 text-xs font-semibold text-gray-600">{{ __('Mark read') }}</button>
                    </form>
                @endif
                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('{{ __('Delete this message?') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-full border border-red-200 px-4 py-2 text-xs font-semibold text-red-600">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>

        @if($contact->reply_body)
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Last reply sent') }}</h3>
                <p class="text-sm text-muted">{{ $contact->replied_at?->format('M d, Y H:i') }}</p>
                <div class="mt-4 rounded-2xl bg-gray-50 p-4 text-gray-700 leading-relaxed">
                    {{ $contact->reply_body }}
                </div>
            </div>
        @endif
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-900">{{ __('Send a reply') }}</h3>
        <form method="POST" action="{{ route('admin.contacts.reply', $contact) }}" class="mt-4 space-y-4">
            @csrf
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">{{ __('Subject') }}</label>
                <input type="text" name="subject" value="{{ old('subject', $contact->reply_subject ?? __('Re: Contact form submission')) }}" class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-primary focus:outline-none" required>
                @error('subject')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase">{{ __('Message') }}</label>
                <textarea name="body" rows="6" class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-primary focus:outline-none" required>{{ old('body', $contact->reply_body) }}</textarea>
                @error('body')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full rounded-full bg-primary py-3 text-sm font-semibold text-white">{{ __('Send reply') }}</button>
        </form>
    </div>
</div>
@endsection



