{{--
    resources/views/components/filter-panel.blade.php
    Mirrors: src/app/components/FilterPanel.tsx
--}}
<div class="bg-white rounded-xl shadow-lg p-6 space-y-6">
    <div>
        <h3 class="font-semibold text-lg text-gray-900 mb-4">Filters</h3>
    </div>

    <form method="GET" action="{{ url('/hotels') }}">

        {{-- Price Range --}}
        <div class="border-t pt-6">
            <h4 class="font-medium text-gray-900 mb-3">Price Range</h4>
            <div class="space-y-3">
                <x-input
                    type="range"
                    id="price-range"
                    name="max_price"
                    min="0"
                    max="1000"
                    step="50"
                    value="{{ request('max_price', 1000) }}"
                    oninput="document.getElementById('price-label').textContent = '$0 – $' + this.value + '+'"
                />
                <div class="flex justify-between text-sm text-gray-600">
                    <span>$0</span>
                    <span id="price-label">${{ request('max_price', 1000) }}+</span>
                </div>
            </div>
        </div>

        {{-- Star Rating --}}
        <div class="border-t pt-6 mt-6">
            <h4 class="font-medium text-gray-900 mb-3">Star Rating</h4>
            <div class="space-y-2">
                @foreach([5, 4, 3] as $rating)
                <label class="flex items-center space-x-2 cursor-pointer">
                    <x-input
                        type="checkbox"
                        name="rating[]"
                        value="{{ $rating }}"
                        {{ in_array($rating, request('rating', [])) ? 'checked' : '' }}
                    />
                    <div class="flex items-center space-x-1">
                        @for($i = 0; $i < $rating; $i++)
                        <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        @endfor
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        {{-- Amenities --}}
        <div class="border-t pt-6 mt-6">
            <h4 class="font-medium text-gray-900 mb-3">Amenities</h4>
            @php
                $amenities = [
                    ['id' => 'wifi',       'name' => 'WiFi',       'icon' => 'wifi'],
                    ['id' => 'pool',       'name' => 'Pool',       'icon' => 'waves'],
                    ['id' => 'gym',        'name' => 'Gym',        'icon' => 'dumbbell'],
                    ['id' => 'restaurant', 'name' => 'Restaurant', 'icon' => 'utensils'],
                    ['id' => 'parking',    'name' => 'Parking',    'icon' => 'car'],
                    ['id' => 'spa',        'name' => 'Spa',        'icon' => 'sparkles'],
                ];
            @endphp
            <div class="space-y-2">
                @foreach($amenities as $amenity)
                <label class="flex items-center space-x-2 cursor-pointer">
                    <x-input
                        type="checkbox"
                        name="amenities[]"
                        value="{{ $amenity['id'] }}"
                        {{ in_array($amenity['id'], request('amenities', [])) ? 'checked' : '' }}
                    />
                    <div class="flex items-center space-x-2">
                        <i data-lucide="{{ $amenity['icon'] }}" class="w-4 h-4"></i>
                        <span class="text-sm text-gray-700">{{ $amenity['name'] }}</span>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        {{-- Room Capacity --}}
        <div class="border-t pt-6 mt-6">
            <h4 class="font-medium text-gray-900 mb-3">Room Capacity</h4>
            <div class="space-y-2">
                @foreach([1, 2, 3, 4, 5] as $capacity)
                <label class="flex items-center space-x-2 cursor-pointer">
                    <x-input
                        type="radio"
                        name="capacity"
                        value="{{ $capacity }}"
                        {{ request('capacity') == $capacity ? 'checked' : '' }}
                    />
                    <span class="text-sm text-gray-700">
                        {{ $capacity }}+ {{ $capacity === 1 ? 'Guest' : 'Guests' }}
                    </span>
                </label>
                @endforeach
            </div>
        </div>

        {{-- Buttons --}}
        <div class="mt-6 space-y-2">
<x-button type="submit" block size="sm">Apply Filters</x-button>
<x-button href="{{ url('/hotels') }}" variant="secondary" block size="sm">Reset Filters</x-button>
        </div>
    </form>
</div>
