@props([
  'title',
  'value',
  'icon'  => 'bar-chart',
  'trend' => null,
  'color' => 'blue',
])

@php
  $colorClasses = [
    'blue'   => 'bg-blue-100 text-blue-900',
    'green'  => 'bg-green-100 text-green-900',
    'purple' => 'bg-purple-100 text-purple-900',
    'orange' => 'bg-orange-100 text-orange-900',
  ];
  $iconClass = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="bg-white rounded-xl shadow-lg p-6">
  <div class="flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-600 mb-1">{{ $title }}</p>
      <p class="text-3xl font-bold text-gray-900">{{ $value }}</p>
      @if($trend)
        <p class="text-sm mt-2 {{ $trend['isPositive'] ? 'text-green-600' : 'text-red-600' }}">
          {{ $trend['isPositive'] ? '↑' : '↓' }} {{ $trend['value'] }}
        </p>
      @endif
    </div>
    <div class="w-14 h-14 rounded-full flex items-center justify-center {{ $iconClass }}">
      <x-icon name="{{ $icon }}" class="w-7 h-7" />
    </div>
  </div>
</div>
