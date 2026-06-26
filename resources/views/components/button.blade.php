@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'icon' => null,
    'block' => false,
])

@php
    $baseClasses = 'cursor-pointer inline-flex items-center justify-center font-semibold rounded-lg transition-colors';

    $variants = [
        'primary' => 'bg-blue-900 text-white hover:bg-blue-800',
        'secondary' => 'bg-gray-100 text-gray-700 hover:bg-gray-200 font-medium',
        'outline' => 'border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium',
        'ghost' => 'text-gray-700 hover:text-blue-900',
        'inverted' => 'bg-white text-blue-900 hover:bg-gray-100',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-2',
        'lg' => 'px-8 py-3',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
    if ($block) $classes .= ' w-full text-center';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<i data-lucide="{{ $icon }}" class="w-5 h-5"></i> @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<i data-lucide="{{ $icon }}" class="w-5 h-5"></i> @endif
        {{ $slot }}
    </button>
@endif
