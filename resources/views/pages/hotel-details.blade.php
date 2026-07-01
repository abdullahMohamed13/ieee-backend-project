@php
  $amenityIcons = [
    'WiFi'       => 'wifi',
    'Restaurant' => 'utensils',
    'Gym'        => 'dumbbell',
    'Pool'       => 'waves',
    'Parking'    => 'car',
    'Spa'        => 'sparkles',
  ];
@endphp

<x-layouts.app
  title="{{ $hotel ? $hotel['name'] . ' – LuxStay' : 'Hotel Not Found – LuxStay' }}"
  description="{{ $hotel['description'] ?? '' }}"
>

  @if(!$hotel)
    <div class="py-16 text-center">
      <h2 class="text-2xl font-bold text-gray-900">Hotel not found</h2>
      <a href="{{ url('/hotels') }}" class="text-blue-900 hover:underline mt-4 inline-block">Back to Hotels</a>
    </div>
  @else

    <div class="py-8 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-6 text-sm text-gray-600">
          <a href="{{ url('/') }}" class="hover:text-blue-900">Home</a>
          <span class="mx-2">/</span>
          <a href="{{ url('/hotels') }}" class="hover:text-blue-900">Hotels</a>
          <span class="mx-2">/</span>
          <span class="text-gray-900">{{ $hotel['name'] }}</span>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 p-2">
            <div class="lg:col-span-2">
              <img
                id="main-image"
                src="{{ $hotel['images'][0] }}"
                alt="{{ $hotel['name'] }}"
                class="w-full h-[500px] object-cover rounded-lg"
              />
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-1 gap-2">
              @foreach(array_slice($hotel['images'], 0, 4) as $index => $image)
                <img
                  src="{{ $image }}"
                  alt="{{ $hotel['name'] }} {{ $index + 1 }}"
                  onclick="document.getElementById('main-image').src='{{ $image }}'; document.querySelectorAll('.thumb').forEach(e=>e.classList.remove('ring-4','ring-blue-900')); this.classList.add('ring-4','ring-blue-900');"
                  class="thumb w-full h-[120px] object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity {{ $index === 0 ? 'ring-4 ring-blue-900' : '' }}"
                />
              @endforeach
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

          <div class="lg:col-span-2 space-y-8">

            <div class="bg-white rounded-xl shadow-lg p-6">
              <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-4">
                <div>
                  <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $hotel['name'] }}</h1>
                  <div class="flex items-center space-x-4 text-gray-600 mb-2">
                    <div class="flex items-center space-x-1">
                      @for($i = 0; $i < $hotel['rating']; $i++)
                        <x-icon name="star" class="w-5 h-5 fill-yellow-400 text-yellow-400" />
                      @endfor
                    </div>
                    <span>•</span>
                    <div class="flex items-center">
                      <x-icon name="map-pin" class="w-4 h-4 mr-1" />
                      {{ $hotel['location'] }}
                    </div>
                  </div>
                </div>
              </div>
              <p class="text-gray-700 leading-relaxed">{{ $hotel['description'] }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Amenities</h2>
              <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($hotel['amenities'] as $amenity)
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-900">
                      <x-icon name="{{ $amenityIcons[$amenity] ?? 'star' }}" class="w-5 h-5" />
                    </div>
                    <span class="text-gray-700">{{ $amenity }}</span>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Available Rooms</h2>
              <div class="overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr class="border-b">
                      <th class="text-left py-3 px-4 font-semibold text-gray-900">Room Type</th>
                      <th class="text-left py-3 px-4 font-semibold text-gray-900">Capacity</th>
                      <th class="text-left py-3 px-4 font-semibold text-gray-900">Price/Night</th>
                      <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
                      <th class="text-left py-3 px-4 font-semibold text-gray-900"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($hotelRooms as $room)
                      <tr class="border-b hover:bg-gray-50">
                        <td class="py-4 px-4">
                          <div class="flex items-center space-x-2">
                            <x-icon name="bed" class="w-5 h-5 text-gray-600" />
                            <span class="font-medium">{{ $room['type'] }}</span>
                          </div>
                        </td>
                        <td class="py-4 px-4">
                          <div class="flex items-center space-x-1 text-gray-600">
                            <x-icon name="users" class="w-4 h-4" />
                            <span>{{ $room['capacity'] }} Guests</span>
                          </div>
                        </td>
                        <td class="py-4 px-4">
                          <span class="font-semibold text-blue-900">${{ $room['price'] }}</span>
                        </td>
                        <td class="py-4 px-4">
                          <span class="px-3 py-1 rounded-full text-sm {{ $room['available'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $room['available'] ? 'Available' : 'Booked' }}
                          </span>
                        </td>
                        <td class="py-4 px-4">
                          @if($room['available'])
                            <x-button href="{{ url('/booking/' . $hotel['id']) }}" variant="primary" size="sm">Book Now</x-button>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Customer Reviews</h2>
              <div class="space-y-6">
                @foreach($reviews as $review)
                  <div class="border-b pb-6 last:border-b-0">
                    <div class="flex items-start space-x-4">
                      <img
                        src="{{ $review['avatar'] }}"
                        alt="{{ $review['name'] }}"
                        class="w-12 h-12 rounded-full object-cover"
                      />
                      <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                          <div>
                            <p class="font-semibold text-gray-900">{{ $review['name'] }}</p>
                            <p class="text-sm text-gray-600">{{ $review['date'] }}</p>
                          </div>
                          <div class="flex items-center space-x-1">
                            @for($i = 0; $i < $review['rating']; $i++)
                              <x-icon name="star" class="w-4 h-4 fill-yellow-400 text-yellow-400" />
                            @endfor
                          </div>
                        </div>
                        <p class="text-gray-700">{{ $review['text'] }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

          </div>

          <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
              <div class="mb-6">
                <p class="text-sm text-gray-600 mb-1">Starting from</p>
                <p class="text-4xl font-bold text-blue-900">
                  ${{ $hotel['price'] }}<span class="text-lg font-normal text-gray-600">/night</span>
                </p>
              </div>
              <x-button href="{{ url('/booking/' . $hotel['id']) }}" variant="primary" block class="mb-4">Book Now</x-button>
              <div class="space-y-3 text-sm text-gray-600">
                <div class="flex items-center justify-between">
                  <span>Free cancellation</span>
                  <span class="text-green-600 font-semibold">✓</span>
                </div>
                <div class="flex items-center justify-between">
                  <span>No prepayment needed</span>
                  <span class="text-green-600 font-semibold">✓</span>
                </div>
                <div class="flex items-center justify-between">
                  <span>Best price guarantee</span>
                  <span class="text-green-600 font-semibold">✓</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  @endif
</x-layouts.app>
