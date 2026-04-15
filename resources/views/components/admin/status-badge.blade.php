@props(['type' => 'active', 'value' => true])

@php
    $colors = [
        'active' => [
            true => 'bg-green-100 text-green-800',
            false => 'bg-red-100 text-red-800'
        ],
        'featured' => [
            true => 'bg-yellow-100 text-yellow-800',
            false => 'bg-gray-100 text-gray-800'
        ]
    ];
    $color = $colors[$type][$value] ?? 'bg-gray-100 text-gray-800';
    $label = $type === 'active' ? ($value ? 'Active' : 'Inactive') : ($value ? 'Featured' : 'Standard');
@endphp

<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $color }}">
    {{ $label }}
</span>



