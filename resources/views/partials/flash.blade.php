@if(session('success'))
    <div class="mx-auto mt-8 w-11/12 max-w-3xl rounded-full border border-emerald-200/60 bg-emerald-50/80 px-6 py-3 text-center text-sm font-medium text-emerald-900 shadow-sm" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mx-auto mt-8 w-11/12 max-w-3xl rounded-full border border-rose-200/60 bg-rose-50/80 px-6 py-3 text-center text-sm font-medium text-rose-900 shadow-sm" role="alert">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="mx-auto mt-8 w-11/12 max-w-3xl rounded-full border border-primary/20 bg-primary/5 px-6 py-3 text-center text-sm font-medium text-primary shadow-sm" role="alert">
        {{ __('Please review the highlighted fields and try again.') }}
    </div>
@endif



