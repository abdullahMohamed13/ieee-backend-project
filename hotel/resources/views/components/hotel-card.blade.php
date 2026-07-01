{{--
  Component: hotel-card
  Props:
    $hotel (array|object) – hotel data
--}}
@props(['hotel'])

<div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
  <div class="relative h-48 overflow-hidden">
    <img
      src="{{ $hotel['image'] }}"
      alt="{{ $hotel['name'] }}"
      class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
    />
    @if($hotel['featured'] ?? false)
      <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
        Featured
      </span>
    @endif
  </div>

  <div class="p-5">
    {{-- Name & Rating --}}
    <div class="flex justify-between items-start mb-2">
      <h3 class="text-xl font-semibold text-gray-900">{{ $hotel['name'] }}</h3>
      <div class="flex items-center space-x-1">
        @for($i = 0; $i < ($hotel['rating'] ?? 0); $i++)
          <x-icon name="star" class="w-4 h-4 fill-yellow-400 text-yellow-400" />
        @endfor
      </div>
    </div>

    {{-- Location --}}
    <div class="flex items-center text-gray-600 mb-3">
      <x-icon name="map-pin" class="w-4 h-4 mr-1" />
      <span class="text-sm">{{ $hotel['location'] }}</span>
    </div>

    {{-- Amenity Icons --}}
    <div class="flex items-center space-x-2 mb-4">
      @php
        $amenityIcons = [
          'WiFi'       => 'wifi',
          'Restaurant' => 'utensils',
          'Gym'        => 'dumbbell',
          'Pool'       => 'waves',
        ];
        $amenities = array_slice($hotel['amenities'] ?? [], 0, 4);
        $extra     = count($hotel['amenities'] ?? []) - 4;
      @endphp

      @foreach($amenities as $amenity)
        @if(isset($amenityIcons[$amenity]))
          <div class="flex items-center space-x-1 text-gray-600" title="{{ $amenity }}">
            <x-icon name="{{ $amenityIcons[$amenity] }}" class="w-4 h-4" />
          </div>
        @endif
      @endforeach

      @if($extra > 0)
        <span class="text-sm text-gray-500">+{{ $extra }} more</span>
      @endif
    </div>

    {{-- Price & CTA --}}
    <div class="flex justify-between items-center pt-4 border-t">
      <div>
        <p class="text-sm text-gray-600">Starting from</p>
        <p class="text-2xl font-bold text-blue-900">
          ${{ $hotel['price'] }}<span class="text-sm font-normal text-gray-600">/night</span>
        </p>
      </div>
      <a
        href="{{ url('/hotels/' . $hotel['id']) }}"
        class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition-colors"
      >
        View Details
      </a>
    </div>
  </div>
</div>
