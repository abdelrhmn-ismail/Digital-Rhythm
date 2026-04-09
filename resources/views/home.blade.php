@extends('layouts.app')

@section('title', __('Golden Bee | Global Creative Agency'))

@section('content')
<main class="flex-grow">
    <x-home.hero />
    <x-home.solutions :services="$services" />
    <x-home.showcase :portfolios="$portfolios" />
    <x-home.why-choose-us />
    <x-home.impact />
    <x-home.partners />
    <x-home.testimonials :testimonials="$testimonials" />
    <x-home.cta />
</main>
@endsection

