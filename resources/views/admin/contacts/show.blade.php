@extends('admin.layouts.app')

@section('title', __('Contact Inquiry'))

@section('content')
<div class="max-w-7xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary mb-2 text-alexandria">
                <a href="{{ route('admin.contacts.index') }}" class="hover:text-primary/70 transition-colors">{{ __('INBOX') }}</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ __('MESSAGE DETAILS') }}</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tight">{{ __('Inquiry Details') }}</h1>
        </div>
        
        <div class="flex items-center gap-3">
            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" onsubmit="return confirm('{{ __('Delete this message permanentely?') }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-red-100 text-red-500 text-[10px] font-black uppercase tracking-widest hover:bg-red-50 transition-all active:scale-95 shadow-sm">
                    <span class="material-icons text-sm">delete_outline</span>
                    {{ __('Archive / Delete') }}
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Message Content -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[40px] p-10 shadow-sm border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-10 -mt-10 pointer-events-none"></div>
                
                <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-10 ml-1">
                    <span class="material-icons text-sm">mail_outline</span>
                    {{ __('Customer Transmission') }}
                </h3>

                <div class="bg-gray-50/50 rounded-[32px] p-10 border border-gray-100/50 min-h-[300px] relative">
                    <span class="material-icons absolute top-8 right-8 text-primary/10 text-6xl rotate-12 pointer-events-none">format_quote</span>
                    <div class="text-gray-700 leading-relaxed font-medium whitespace-pre-wrap relative z-10">{{ $contact->message }}</div>
                </div>

                <div class="mt-10 flex flex-wrap gap-4">
                    @if($contact->is_read)
                        <form method="POST" action="{{ route('admin.contacts.mark-unread', $contact) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-gray-100 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition-all">
                                <span class="material-icons text-xs">mark_email_unread</span>
                                {{ __('Mark as Unread') }}
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.contacts.mark-read', $contact) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-gray-100 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition-all">
                                <span class="material-icons text-xs">mark_email_read</span>
                                {{ __('Mark as Read') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Reply History -->
            @if($contact->reply_body)
                <div class="bg-primary/5 rounded-[40px] p-10 border border-primary/10 space-y-8">
                    <h3 class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-primary/40 mb-2 ml-1">
                        <span class="material-icons text-sm">reply_all</span>
                        {{ __('Last Outbound Reply') }}
                    </h3>
                    <div class="bg-white rounded-[32px] p-10 shadow-sm border border-gray-100 relative">
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-[9px] font-black text-primary uppercase tracking-widest">{{ __('Subject') }}: {{ $contact->reply_subject }}</span>
                            <span class="text-[9px] font-bold text-gray-400">{{ $contact->replied_at?->format('M d, Y @ H:i') }}</span>
                        </div>
                        <div class="text-sm font-medium text-gray-700 leading-relaxed">{{ $contact->reply_body }}</div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Meta Sidebar -->
        <div class="space-y-8">
            <!-- Sender Profile -->
            <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 space-y-8 relative overflow-hidden">
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary/5 rounded-full pointer-events-none"></div>
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-8 ml-1">{{ __('Sender Profile') }}</h3>
                
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-16 h-16 rounded-[24px] bg-primary/10 flex items-center justify-center">
                        <span class="material-icons text-primary text-2xl font-bold">{{ substr($contact->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-black text-gray-900 tracking-tight">{{ $contact->name }}</h4>
                        <p class="text-[10px] font-bold text-gray-400">{{ $contact->company ?: __('Individual Client') }}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-50 p-5 rounded-2xl group hover:bg-white hover:shadow-sm border border-transparent transition-all">
                        <label class="block text-[8px] font-black uppercase tracking-widest text-gray-400 mb-2">{{ __('Email Address') }}</label>
                        <a href="mailto:{{ $contact->email }}" class="text-xs font-black text-primary hover:text-primary/70 transition-colors">{{ $contact->email }}</a>
                    </div>
                    <div class="bg-gray-50 p-5 rounded-2xl group hover:bg-white hover:shadow-sm border border-transparent transition-all">
                        <label class="block text-[8px] font-black uppercase tracking-widest text-gray-400 mb-2">{{ __('Phone Line') }}</label>
                        <p class="text-xs font-black text-gray-700">{{ $contact->phone ?: __('No phone left') }}</p>
                    </div>
                    @if($contact->budget)
                        <div class="bg-primary/5 p-5 rounded-2xl border border-primary/10">
                            <label class="block text-[8px] font-black uppercase tracking-widest text-primary/40 mb-2">{{ __('Estimated Budget') }}</label>
                            <p class="text-xs font-black text-primary">{{ $contact->budget }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Action "Others" organized (as requested) -->
            <div class="bg-gray-900 rounded-[40px] p-8 shadow-2xl space-y-8 text-white">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-white/40 mb-8 ml-1">{{ __('Response Others') }}</h3>
                
                <form method="POST" action="{{ route('admin.contacts.reply', $contact) }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-white/40 mb-3 ml-1">{{ __('Subject Template') }}</label>
                        <input type="text" name="subject" value="{{ old('subject', $contact->reply_subject ?? 'Re: ' . config('app.name') . ' Inquiry') }}"
                            class="w-full px-5 py-3 rounded-2xl bg-white/5 border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-xs font-bold text-white">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black uppercase tracking-widest text-white/40 mb-3 ml-1">{{ __('Draft Message') }}</label>
                        <textarea name="body" class="tinymce w-full px-5 py-4 rounded-[24px] bg-white/5 border-transparent focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all outline-none text-xs font-medium text-white/80 leading-relaxed shadow-inner" required>{{ old('body', $contact->reply_body) }}</textarea>
                    </div>
                    <button type="submit" class="w-full py-4 rounded-[24px] bg-primary text-white text-[10px] font-black uppercase tracking-[0.3em] hover:bg-primary/90 transition-all shadow-xl shadow-primary/25 active:scale-95">
                        {{ __('Transmit Reply') }}
                    </button>
                    <p class="text-center text-[8px] font-bold text-white/20 italic">{{ __('Response will be delivered instantly via SMTP') }}</p>
                </form>
            </div>

            <!-- Metadata Timestamp -->
            <div class="bg-white rounded-[40px] p-8 shadow-sm border border-gray-100 flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-primary/30 group-hover:text-primary transition-colors">history</span>
                    <span class="text-[9px] font-black uppercase tracking-widest text-gray-400">{{ __('Log Timestamp') }}</span>
                </div>
                <span class="text-[9px] font-black text-gray-900">{{ $contact->created_at?->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '.tinymce',
        menubar: false,
        plugins: 'link lists autolink code',
        toolbar: 'bold italic | bullist numlist | link | removeformat | code',
        skin: 'oxide-dark',
        content_css: 'dark',
        height: 300,
        branding: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
});
</script>
@endsection


