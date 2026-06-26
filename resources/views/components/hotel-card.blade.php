{{--
    resources/views/components/hotel-card.blade.php
    Mirrors: src/app/components/HotelCard.tsx

    Usage:
        @foreach($hotels as $hotel)
            @include('components.hotel-card', ['hotel' => $hotel])
        @endforeach

    Expected $hotel object/array keys:
        id, name, location, rating, price, image, amenities (array), featured (bool)
--}}
<div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
    {{-- Image --}}
    <div class="relative h-48 overflow-hidden">
        <img
            src="{{ $hotel['image'] ?? $hotel->image }}"
            alt="{{ $hotel['name'] ?? $hotel->name }}"
            class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
        />
        @if($hotel['featured'] ?? $hotel->featured ?? false)
        <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
            Featured
        </span>
        @endif
    </div>

    {{-- Card Body --}}
    <div class="p-5">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xl font-semibold text-gray-900">{{ $hotel['name'] ?? $hotel->name }}</h3>
            <div class="flex items-center space-x-1">
                @for($i = 0; $i < ($hotel['rating'] ?? $hotel->rating ?? 0); $i++)
                <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                @endfor
            </div>
        </div>

        <div class="flex items-center text-gray-600 mb-3">
            <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
            <span class="text-sm">{{ $hotel['location'] ?? $hotel->location }}</span>
        </div>

        {{-- Amenity Icons --}}
        @php
            $amenities = $hotel['amenities'] ?? $hotel->amenities ?? [];
            $amenityIcons = [
                'WiFi'       => 'wifi',
                'Restaurant' => 'utensils',
                'Gym'        => 'dumbbell',
                'Pool'       => 'waves',
                'Parking'    => 'car',
                'Spa'        => 'sparkles',
            ];
        @endphp
        <div class="flex items-center space-x-2 mb-4">
            @foreach(array_slice((array)$amenities, 0, 4) as $amenity)
            <div class="flex items-center space-x-1 text-gray-600" title="{{ $amenity }}">
                @if(isset($amenityIcons[$amenity]))
                <i data-lucide="{{ $amenityIcons[$amenity] }}" class="w-4 h-4"></i>
                @endif
            </div>
            @endforeach
            @if(count((array)$amenities) > 4)
            <span class="text-sm text-gray-500">+{{ count((array)$amenities) - 4 }} more</span>
            @endif
        </div>

        {{-- Price + CTA --}}
        <div class="flex justify-between items-center pt-4 border-t">
            <div>
                <p class="text-sm text-gray-600">Starting from</p>
                <p class="text-2xl font-bold text-blue-900">
                    ${{ $hotel['price'] ?? $hotel->price }}
                    <span class="text-sm font-normal text-gray-600">/night</span>
                </p>
            </div>
            <x-button href="{{ url('/hotels/' . ($hotel['id'] ?? $hotel->id)) }}" size="sm">View Details</x-button>
        </div>
    </div>
</div>
