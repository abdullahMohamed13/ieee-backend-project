@props([
    'type' => 'text',
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'icon' => null,
    'required' => false,
    'disabled' => false,
    'old' => true,
])

@php
    $isCheckable = in_array($type, ['checkbox', 'radio']);

    if ($isCheckable) {
        $classes = 'w-4 h-4 text-blue-900 focus:ring-blue-900';
        if ($type === 'checkbox') $classes .= ' border-gray-300 rounded';
    } elseif ($type === 'range') {
        $classes = 'w-full accent-blue-900';
    } else {
        $classes = 'w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent';
        $classes .= $icon ? ' pl-10 pr-4 py-3' : ' px-4 py-3';
    }

    $inputValue = $type === 'password' ? ($value ?? '') : ($value ?? '');
    if ($old && $type !== 'password' && $name && !$attributes->has('value')) {
        $inputValue = old($name, $value ?? '');
    }
@endphp

@if($icon)
<div class="relative">
    <i data-lucide="{{ $icon }}" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ $inputValue }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->class($classes) }}
    />
</div>
@elseif($isCheckable)
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ $inputValue }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->class($classes) }}
    />
@else
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ $inputValue }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->class($classes) }}
    />
@endif
