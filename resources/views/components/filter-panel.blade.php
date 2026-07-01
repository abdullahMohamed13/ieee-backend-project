{{--
  Component: filter-panel
  No required props — renders filter sidebar for the Hotels Listing page.
--}}
<div class="bg-white rounded-xl shadow-lg p-6 space-y-6">
  <div>
    <h3 class="font-semibold text-lg text-gray-900 mb-4">Filters</h3>
  </div>

  {{-- Price Range --}}
  <div class="border-t pt-6">
    <h4 class="font-medium text-gray-900 mb-3">Price Range</h4>
    <div class="space-y-3">
      <input
        type="range"
        id="price-range"
        min="0"
        max="1000"
        step="50"
        value="{{ request('max_price', 1000) }}"
        class="w-full accent-blue-900"
        oninput="document.getElementById('price-display').textContent = '$0 – $' + this.value + '+'"
      />
      <div class="flex justify-between text-sm text-gray-600">
        <span>$0</span>
        <span id="price-display">${{ request('max_price', 1000) }}+</span>
      </div>
    </div>
  </div>

  {{-- Star Rating --}}
  <div class="border-t pt-6">
    <h4 class="font-medium text-gray-900 mb-3">Star Rating</h4>
    <div class="space-y-2">
      @foreach([5, 4, 3] as $rating)
        <label class="flex items-center space-x-2 cursor-pointer">
          <input
            type="checkbox"
            name="rating[]"
            value="{{ $rating }}"
            class="w-4 h-4 text-blue-900 rounded focus:ring-blue-900"
            {{ in_array($rating, (array)request('rating', [])) ? 'checked' : '' }}
          />
          <div class="flex items-center space-x-1">
            @for($i = 0; $i < $rating; $i++)
              <x-icon name="star" class="w-4 h-4 fill-yellow-400 text-yellow-400" />
            @endfor
          </div>
        </label>
      @endforeach
    </div>
  </div>

  {{-- Amenities --}}
  <div class="border-t pt-6">
    <h4 class="font-medium text-gray-900 mb-3">Amenities</h4>
    <div class="space-y-2">
      @php
        $amenityList = [
          ['id' => 'wifi',       'name' => 'WiFi',       'icon' => 'wifi'],
          ['id' => 'pool',       'name' => 'Pool',       'icon' => 'waves'],
          ['id' => 'gym',        'name' => 'Gym',        'icon' => 'dumbbell'],
          ['id' => 'restaurant', 'name' => 'Restaurant', 'icon' => 'utensils'],
          ['id' => 'parking',    'name' => 'Parking',    'icon' => 'car'],
          ['id' => 'spa',        'name' => 'Spa',        'icon' => 'sparkles'],
        ];
      @endphp

      @foreach($amenityList as $amenity)
        <label class="flex items-center space-x-2 cursor-pointer">
          <input
            type="checkbox"
            name="amenities[]"
            value="{{ $amenity['id'] }}"
            class="w-4 h-4 text-blue-900 rounded focus:ring-blue-900"
            {{ in_array($amenity['id'], (array)request('amenities', [])) ? 'checked' : '' }}
          />
          <div class="flex items-center space-x-2">
            <x-icon name="{{ $amenity['icon'] }}" class="w-4 h-4" />
            <span class="text-sm text-gray-700">{{ $amenity['name'] }}</span>
          </div>
        </label>
      @endforeach
    </div>
  </div>

  {{-- Room Capacity --}}
  <div class="border-t pt-6">
    <h4 class="font-medium text-gray-900 mb-3">Room Capacity</h4>
    <div class="space-y-2">
      @foreach([1, 2, 3, 4, 5] as $capacity)
        <label class="flex items-center space-x-2 cursor-pointer">
          <input
            type="radio"
            name="capacity"
            value="{{ $capacity }}"
            class="w-4 h-4 text-blue-900 focus:ring-blue-900"
            {{ request('capacity') == $capacity ? 'checked' : '' }}
          />
          <span class="text-sm text-gray-700">
            {{ $capacity }}+ {{ $capacity === 1 ? 'Guest' : 'Guests' }}
          </span>
        </label>
      @endforeach
    </div>
  </div>

  {{-- Reset --}}
  <a
    href="{{ url('/hotels') }}"
    class="block w-full bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition-colors font-medium text-center"
  >
    Reset Filters
  </a>
</div>
