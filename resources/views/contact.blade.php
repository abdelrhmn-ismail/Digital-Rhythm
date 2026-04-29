@extends('layouts.app')

@section('title', __('Contact Us') . ' | ' . $siteTitle)
@section('description', __('Get in touch with') . ' ' . $siteTitle . '.')

@section('content')
<main class="contact-page">
    <x-page-header 
        badge="{{ __('START THE CLOCK') }}"
        titleTop="{{ __('INITIATE') }}"
        titleBottom="{{ __('CONTACT') }}"
        subtitle="{{ __('Ready to completely dominate your market? Secure a consultation with our architects today.') }}"
    />
    <section class="contact-grid">
        <div class="contact-grid__container">
            <div class="contact-grid__layout">
                <x-contact.info-panel />
                <x-contact.form-panel />
            </div>
        </div>
    </section>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/pages/contact.js') }}" defer></script>
@endpush



