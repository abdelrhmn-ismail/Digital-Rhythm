@extends('layouts.app')

@php
    $solutions = [
        [
            'number' => '01',
            'title' => 'Digital Marketing',
            'description' => 'Accelerating your growth through data-driven strategic campaigns and tangible results.',
            'href' => route('services'),
        ],
        [
            'number' => '02',
            'title' => 'Web Solutions',
            'description' => 'Designing and developing ultra-fast websites that blend aesthetics with seamless functionality.',
            'href' => route('services'),
        ],
        [
            'number' => '03',
            'title' => 'Creative Production',
            'description' => 'Creating eye-catching visual content that professionally tells your success story.',
            'href' => route('services'),
        ],
        [
            'number' => '04',
            'title' => 'Brand Identity',
            'description' => 'Crafting unique visual identities that resonate with your audience and define your market presence.',
            'href' => route('services'),
        ],
    ];

    $showcaseItems = [
        'https://goldenbee.sa/uploads/d8e49609-dd6c-4a7d-b18a-6f8f923c3144.webp',
        'https://goldenbee.sa/uploads/643bbeae-21e8-48dc-87e2-caeae6d82a93.gif',
        'https://goldenbee.sa/uploads/b4d5bb60-eddc-45e2-b328-ae6ceea0a22a.gif',
        'https://goldenbee.sa/uploads/4f1019cb-4c96-4265-a14e-7a82bd543af4.webp',
        'https://goldenbee.sa/uploads/0d7c4434-caea-49e5-bd38-4799e0cd9321.webp',
        'https://goldenbee.sa/uploads/0ec7031e-1978-4fd1-bb91-514aef5ddf5f.webp',
        'https://goldenbee.sa/uploads/dc09c60b-66af-437d-9cf0-f95d94f92b09.webp',
        'https://goldenbee.sa/uploads/f059b3b4-0ee7-4a19-8387-78126ab8904f.webp',
        'https://goldenbee.sa/uploads/1f2debc7-e086-4e8d-acb2-f89de82231f2.webp',
        'https://goldenbee.sa/uploads/2d03083e-fb2f-42d9-8d06-808a775ba7fa.webp',
    ];

    $reasons = [
        [
            'number' => '01',
            'title' => 'Digital Innovation',
            'description' => 'Embracing cutting-edge technology to deliver marketing solutions ahead of their time.',
        ],
        [
            'number' => '02',
            'title' => 'Global Expertise',
            'description' => 'Our team combines deep local knowledge with international standards of excellence.',
        ],
        [
            'number' => '03',
            'title' => 'Agility & Speed',
            'description' => 'Adapting to global market shifts to ensure you always stay ahead of the curve.',
        ],
        [
            'number' => '04',
            'title' => 'Result Passion',
            'description' => 'Our success is strictly measured by your goal achievement and brand growth.',
        ],
    ];

    $partners = [
        ['name' => 'Adwaa Namar', 'logo' => 'https://goldenbee.sa/uploads/e341dcd5-05a6-4d67-b7aa-51cfd92c46f0.png'],
        ['name' => 'Olye Spa', 'logo' => 'https://goldenbee.sa/uploads/72ecea1e-fd69-40b3-b752-f1a3e611950d.png'],
        ['name' => 'Noble Smile', 'logo' => 'https://goldenbee.sa/uploads/0bb54058-ad29-42e3-a69e-e49b0130de28.png'],
        ['name' => 'Software Art', 'logo' => 'https://goldenbee.sa/uploads/bd8f6493-f61a-4ff7-b29e-5fedeceddef6.png'],
        ['name' => 'Strong Motors', 'logo' => 'https://goldenbee.sa/uploads/11e7a44e-d280-47c3-87e8-3e4c1d99fa91.png'],
        ['name' => 'ALoeVera Construction', 'logo' => 'https://goldenbee.sa/uploads/a4041347-6e19-488e-ab5c-5c9b888c3fde.png'],
        ['name' => 'Pure Health', 'logo' => 'https://goldenbee.sa/uploads/367f95d5-0336-4c9f-8a26-5beec0fcd741.png'],
        ['name' => 'Fantastic Care', 'logo' => 'https://goldenbee.sa/uploads/2ec5fabd-760a-4983-a281-6e94cb3d1e6e.png'],
        ['name' => 'Healthy Clinics', 'logo' => 'https://goldenbee.sa/uploads/3c9ea38c-546a-443b-b934-f4f7d2787bed.png'],
    ];

    $stats = [
        ['value' => '12+', 'label' => 'Years of Mastery'],
        ['value' => '180+', 'label' => 'Global Projects'],
        ['value' => '40+', 'label' => 'Elite Strategies'],
        ['value' => '98%', 'label' => 'Success Rate'],
    ];

    $testimonials = [
        [
            'quote' => 'A world-class creative team that engineered our brand transformation with surgical precision and global impact.',
            'initial' => 'M',
            'name' => 'Mohammed Al-Otaibi',
            'role' => 'CEO, Clinics Healthy',
        ],
        [
            'quote' => 'Stunning execution and unwavering commitment. Their digital strategies delivered results that far exceeded our KPI targets.',
            'initial' => 'S',
            'name' => 'Sarah Al-Ahmad',
            'role' => 'Marketing Manager, Spa Olye',
        ],
        [
            'quote' => 'A powerhouse of strategic intuition. They masterfully bridge the gap between local nuances and global excellence.',
            'initial' => 'A',
            'name' => 'Abdullah Al-Sudairy',
            'role' => 'Founder, Al Mugheb Real Estate',
        ],
    ];
@endphp

@section('title', 'Golden Bee | Global Creative Agency')
@section('description', 'Golden Bee clone homepage built in Laravel with separated sections, cleaner CSS, and organized JavaScript.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/goldenbee/home.css') }}">
@endpush

@push('scripts')
    <script defer src="{{ asset('js/goldenbee/home.js') }}"></script>
@endpush

@section('content')
    <x-home.hero />
    <x-home.solutions :solutions="$solutions" />
    <x-home.showcase :items="$showcaseItems" />
    <x-home.why-choose-us :reasons="$reasons" />
    <x-home.partners :partners="$partners" />
    <x-home.impact :stats="$stats" />
    <x-home.testimonials :testimonials="$testimonials" />
@endsection
