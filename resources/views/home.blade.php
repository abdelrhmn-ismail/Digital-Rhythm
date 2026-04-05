@extends('layouts.app')

@section('title', 'Golden Bee | Global Creative Agency')

@section('content')
<main class="flex-grow">
    <x-home.hero />
    <x-home.solutions :services="$services" />
    <x-home.showcase />
    <x-home.why-choose-us />
    <x-home.partners />
</main>
@endsection

