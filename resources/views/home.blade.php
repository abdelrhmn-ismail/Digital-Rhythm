@extends('layouts.app')

@section('title', $siteTitle . ' | ' . __('Global Creative Agency'))

@section('content')
<main class="flex-grow">
    <x-home.hero />
    <x-home.why-choose-us />
    <x-home.impact />
    <x-home.partners :partners="$partners" />
    <x-home.testimonials :testimonials="$testimonials" />
    <x-home.cta />
</main>
@endsection




