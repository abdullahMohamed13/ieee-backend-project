@php
  // ── Mock data ─────────────────────────────────────────────────────────────
  $allHotels = [
    ['id'=>'1','name'=>'Grand Luxury Hotel','location'=>'Downtown, New York','city'=>'New York','rating'=>5,'price'=>299,'featured'=>true,
     'image'=>'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
     'images'=>[
       'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
       'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800',
       'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800',
       'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=800',
     ],
     'description'=>'Experience ultimate luxury at the Grand Luxury Hotel, featuring world-class amenities, stunning views, and impeccable service. Located in the heart of downtown New York, our hotel offers the perfect blend of elegance and comfort.',
     'amenities'=>['WiFi','Pool','Spa','Gym','Restaurant','Bar','Room Service','Parking'],
    ],
    ['id'=>'2','name'=>'Seaside Resort & Spa','location'=>'Beachfront, Miami','city'=>'Miami','rating'=>5,'price'=>349,'featured'=>true,
     'image'=>'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
     'images'=>[
       'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
       'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
       'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800',
     ],
     'description'=>'Escape to paradise at our beachfront resort. Enjoy pristine beaches, world-class spa treatments, and breathtaking ocean views from every room.',
     'amenities'=>['WiFi','Beach Access','Spa','Pool','Restaurant','Bar','Water Sports'],
    ],
    ['id'=>'3','name'=>'Mountain View Lodge','location'=>'Aspen, Colorado','city'=>'Aspen','rating'=>4,'price'=>189,'featured'=>true,
     'image'=>'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
     'images'=>[
       'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
       'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
     ],
     'description'=>'Nestled in the Rocky Mountains, our lodge offers a perfect retreat for nature lovers and adventure seekers. Enjoy skiing, hiking, and stunning mountain views.',
     'amenities'=>['WiFi','Ski Storage','Fireplace','Restaurant','Parking','Gym'],
    ],
    ['id'=>'4','name'=>'City Center Hotel','location'=>'Downtown, Chicago','city'=>'Chicago','rating'=>4,'price'=>159,'featured'=>false,
     'image'=>'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800',
     'images'=>['https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800','https://images.unsplash.com/photo-1596701062351-8c2c14d1fdd0?w=800'],
     'description'=>'Modern elegance meets urban convenience. Perfect for business and leisure travelers seeking comfort in the heart of Chicago.',
     'amenities'=>['WiFi','Business Center','Gym','Restaurant','Parking'],
    ],
    ['id'=>'5','name'=>'Desert Oasis Resort','location'=>'Scottsdale, Arizona','city'=>'Scottsdale','rating'=>5,'price'=>279,'featured'=>false,
     'image'=>'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
     'images'=>['https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800'],
     'description'=>'A luxurious oasis in the desert. Experience southwestern hospitality, championship golf, and spectacular sunsets.',
     'amenities'=>['WiFi','Golf Course','Spa','Pool','Restaurant','Tennis Court'],
    ],
    ['id'=>'6','name'=>'Historic Downtown Inn','location'=>'French Quarter, New Orleans','city'=>'New Orleans','rating'=>4,'price'=>139,'featured'=>false,
     'image'=>'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800',
     'images'=>['https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800'],
     'description'=>'Charming historic hotel in the heart of the French Quarter. Experience the unique culture and vibrant nightlife of New Orleans.',
     'amenities'=>['WiFi','Restaurant','Bar','Courtyard','Room Service'],
    ],
    ['id'=>'7','name'=>'Coastal Paradise Hotel','location'=>'Santa Monica, California','city'=>'Los Angeles','rating'=>5,'price'=>319,'featured'=>true,
     'image'=>'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800',
     'images'=>['https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800'],
     'description'=>'Stunning ocean views and California sunshine await. Walk to the pier, enjoy beach activities, and relax in luxury.',
     'amenities'=>['WiFi','Beach Access','Pool','Spa','Restaurant','Gym','Bike Rentals'],
    ],
    ['id'=>'8','name'=>'Urban Boutique Hotel','location'=>'SoHo, New York','city'=>'New York','rating'=>4,'price'=>229,'featured'=>false,
     'image'=>'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800',
     'images'=>['https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800'],
     'description'=>'Stylish boutique hotel in trendy SoHo. Perfect for fashion-forward travelers seeking unique design and personalized service.',
     'amenities'=>['WiFi','Rooftop Bar','Restaurant','Concierge','Art Gallery'],
    ],
  ];

  $allRooms = [
    ['id'=>'r1','hotelId'=>'1','type'=>'Deluxe King',       'capacity'=>2,'price'=>299,'available'=>true, 'amenities'=>['King Bed','City View','Work Desk']],
    ['id'=>'r2','hotelId'=>'1','type'=>'Executive Suite',   'capacity'=>3,'price'=>449,'available'=>true, 'amenities'=>['King Bed','Living Room','Balcony']],
    ['id'=>'r3','hotelId'=>'1','type'=>'Presidential Suite','capacity'=>4,'price'=>799,'available'=>true, 'amenities'=>['Master Bedroom','Dining Room','Panoramic View']],
    ['id'=>'r4','hotelId'=>'2','type'=>'Ocean View Room',   'capacity'=>2,'price'=>349,'available'=>true, 'amenities'=>['Queen Bed','Ocean View','Balcony']],
    ['id'=>'r5','hotelId'=>'2','type'=>'Beach Villa',       'capacity'=>4,'price'=>599,'available'=>false,'amenities'=>['2 Bedrooms','Private Beach Access','Terrace']],
    ['id'=>'r6','hotelId'=>'3','type'=>'Mountain View Room','capacity'=>2,'price'=>189,'available'=>true, 'amenities'=>['King Bed','Mountain View','Fireplace']],
  ];

  // Find the hotel by route segment (e.g., /hotels/1 → id=1)
  $hotelId    = request()->segment(2, '1');
  $hotel      = collect($allHotels)->firstWhere('id', $hotelId);
  $hotelRooms = collect($allRooms)->where('hotelId', $hotelId)->values()->all();

  $selectedImage = 0;

  $amenityIcons = [
    'WiFi'       => 'wifi',
    'Restaurant' => 'utensils',
    'Gym'        => 'dumbbell',
    'Pool'       => 'waves',
    'Parking'    => 'car',
    'Spa'        => 'sparkles',
  ];

  $reviews = [
    ['id'=>1,'name'=>'Sarah Johnson','rating'=>5,'date'=>'June 15, 2026',
     'text'=>"Absolutely wonderful stay! The room was immaculate, staff were incredibly friendly, and the location couldn't be better.",
     'avatar'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100'],
    ['id'=>2,'name'=>'Michael Brown','rating'=>5,'date'=>'June 10, 2026',
     'text'=>'Exceeded all expectations. The amenities were top-notch and the service was impeccable. Will definitely return!',
     'avatar'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100'],
    ['id'=>3,'name'=>'Emily Davis','rating'=>4,'date'=>'June 5, 2026',
     'text'=>'Great hotel with beautiful rooms and excellent facilities. Only minor issue was the breakfast could have more variety.',
     'avatar'=>'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100'],
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

        {{-- ── Breadcrumb ──────────────────────────────────────────── --}}
        <div class="mb-6 text-sm text-gray-600">
          <a href="{{ url('/') }}" class="hover:text-blue-900">Home</a>
          <span class="mx-2">/</span>
          <a href="{{ url('/hotels') }}" class="hover:text-blue-900">Hotels</a>
          <span class="mx-2">/</span>
          <span class="text-gray-900">{{ $hotel['name'] }}</span>
        </div>

        {{-- ── Image Gallery ─────────────────────────────────────── --}}
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

          {{-- ── Main Content ──────────────────────────────────────── --}}
          <div class="lg:col-span-2 space-y-8">

            {{-- Hotel Info --}}
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

            {{-- Amenities --}}
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

            {{-- Available Rooms --}}
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
                            <a
                              href="{{ url('/booking/' . $hotel['id']) }}"
                              class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors text-sm"
                            >
                              Book Now
                            </a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            {{-- Customer Reviews --}}
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

          {{-- ── Booking Card ──────────────────────────────────────── --}}
          <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
              <div class="mb-6">
                <p class="text-sm text-gray-600 mb-1">Starting from</p>
                <p class="text-4xl font-bold text-blue-900">
                  ${{ $hotel['price'] }}<span class="text-lg font-normal text-gray-600">/night</span>
                </p>
              </div>
              <a
                href="{{ url('/booking/' . $hotel['id']) }}"
                class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold text-center block mb-4"
              >
                Book Now
              </a>
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
