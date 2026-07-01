@php
  // ── Mock data (mirrors src/app/data/mockData.ts) ─────────────────────────
  $hotels = [
    [
      'id' => '1', 'name' => 'Grand Luxury Hotel',
      'location' => 'Downtown, New York', 'city' => 'New York',
      'rating' => 5, 'price' => 299, 'featured' => true,
      'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
      'amenities' => ['WiFi','Pool','Spa','Gym','Restaurant','Bar','Room Service','Parking'],
    ],
    [
      'id' => '2', 'name' => 'Seaside Resort & Spa',
      'location' => 'Beachfront, Miami', 'city' => 'Miami',
      'rating' => 5, 'price' => 349, 'featured' => true,
      'image' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
      'amenities' => ['WiFi','Beach Access','Spa','Pool','Restaurant','Bar','Water Sports'],
    ],
    [
      'id' => '3', 'name' => 'Mountain View Lodge',
      'location' => 'Aspen, Colorado', 'city' => 'Aspen',
      'rating' => 4, 'price' => 189, 'featured' => true,
      'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
      'amenities' => ['WiFi','Ski Storage','Fireplace','Restaurant','Parking','Gym'],
    ],
    [
      'id' => '4', 'name' => 'City Center Hotel',
      'location' => 'Downtown, Chicago', 'city' => 'Chicago',
      'rating' => 4, 'price' => 159, 'featured' => false,
      'image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800',
      'amenities' => ['WiFi','Business Center','Gym','Restaurant','Parking'],
    ],
    [
      'id' => '5', 'name' => 'Desert Oasis Resort',
      'location' => 'Scottsdale, Arizona', 'city' => 'Scottsdale',
      'rating' => 5, 'price' => 279, 'featured' => false,
      'image' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
      'amenities' => ['WiFi','Golf Course','Spa','Pool','Restaurant','Tennis Court'],
    ],
    [
      'id' => '6', 'name' => 'Historic Downtown Inn',
      'location' => 'French Quarter, New Orleans', 'city' => 'New Orleans',
      'rating' => 4, 'price' => 139, 'featured' => false,
      'image' => 'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800',
      'amenities' => ['WiFi','Restaurant','Bar','Courtyard','Room Service'],
    ],
    [
      'id' => '7', 'name' => 'Coastal Paradise Hotel',
      'location' => 'Santa Monica, California', 'city' => 'Los Angeles',
      'rating' => 5, 'price' => 319, 'featured' => true,
      'image' => 'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800',
      'amenities' => ['WiFi','Beach Access','Pool','Spa','Restaurant','Gym','Bike Rentals'],
    ],
    [
      'id' => '8', 'name' => 'Urban Boutique Hotel',
      'location' => 'SoHo, New York', 'city' => 'New York',
      'rating' => 4, 'price' => 229, 'featured' => false,
      'image' => 'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800',
      'amenities' => ['WiFi','Rooftop Bar','Restaurant','Concierge','Art Gallery'],
    ],
  ];

  $featuredHotels = array_slice(
    array_filter($hotels, fn($h) => $h['featured']),
    0, 6
  );

  $popularDestinations = [
    ['id' => 'd1', 'name' => 'New York',    'hotels' => 156,
     'image' => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800'],
    ['id' => 'd2', 'name' => 'Miami',       'hotels' => 98,
     'image' => 'https://images.unsplash.com/photo-1506966953602-c20cc11f75e3?w=800'],
    ['id' => 'd3', 'name' => 'Los Angeles', 'hotels' => 134,
     'image' => 'https://images.unsplash.com/photo-1534190239940-9ba8944ea261?w=800'],
    ['id' => 'd4', 'name' => 'Chicago',     'hotels' => 87,
     'image' => 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=800'],
  ];

  $testimonials = [
    [
      'id' => 't1', 'name' => 'Jennifer Martinez', 'location' => 'Los Angeles, CA',
      'rating' => 5,
      'text'   => 'Absolutely amazing experience! The hotel exceeded all expectations. Beautiful rooms, excellent service, and the location was perfect. Will definitely book again!',
      'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150',
    ],
    [
      'id' => 't2', 'name' => 'Robert Chen', 'location' => 'San Francisco, CA',
      'rating' => 5,
      'text'   => "Best hotel booking platform I've used. Easy to navigate, great selection of hotels, and the booking process was seamless. Highly recommend!",
      'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150',
    ],
    [
      'id' => 't3', 'name' => 'Amanda Wilson', 'location' => 'Boston, MA',
      'rating' => 5,
      'text'   => 'The attention to detail and customer service was outstanding. From booking to checkout, everything was perfect. The spa was incredible!',
      'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150',
    ],
  ];
@endphp

<x-layouts.app title="LuxStay – Find Your Perfect Stay" description="Discover luxury hotels and resorts worldwide. Book your dream vacation with exclusive deals.">

  {{-- ── Hero Section ─────────────────────────────────────────────────── --}}
  <section
    class="relative h-[600px] bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1600');"
  >
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center">
      <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
        Find Your Perfect Stay
      </h1>
      <p class="text-xl text-white mb-12 max-w-2xl">
        Discover luxury hotels and resorts worldwide. Book your dream vacation with exclusive deals and unbeatable prices.
      </p>
      <div class="w-full max-w-5xl">
        <x-search-bar variant="hero" />
      </div>
    </div>
  </section>

  {{-- ── Features Section ─────────────────────────────────────────────── --}}
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <x-icon name="award" class="w-8 h-8 text-blue-900" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Best Price Guarantee</h3>
          <p class="text-gray-600 text-sm">Find the lowest prices or we'll refund the difference</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <x-icon name="shield" class="w-8 h-8 text-blue-900" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Secure Booking</h3>
          <p class="text-gray-600 text-sm">Your information is protected with 256-bit encryption</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <x-icon name="headphones" class="w-8 h-8 text-blue-900" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">24/7 Support</h3>
          <p class="text-gray-600 text-sm">Our team is here to help you anytime, anywhere</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <x-icon name="star" class="w-8 h-8 text-blue-900" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Premium Selection</h3>
          <p class="text-gray-600 text-sm">Handpicked luxury hotels and exclusive properties</p>
        </div>

      </div>
    </div>
  </section>

  {{-- ── Featured Hotels ──────────────────────────────────────────────── --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Hotels</h2>
        <p class="text-lg text-gray-600">Explore our handpicked selection of luxury accommodations</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($featuredHotels as $hotel)
          <x-hotel-card :hotel="$hotel" />
        @endforeach
      </div>
      <div class="text-center mt-10">
        <a
          href="{{ url('/hotels') }}"
          class="inline-block bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold"
        >
          View All Hotels
        </a>
      </div>
    </div>
  </section>

  {{-- ── Popular Destinations ─────────────────────────────────────────── --}}
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Popular Destinations</h2>
        <p class="text-lg text-gray-600">Discover the world's most sought-after travel destinations</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($popularDestinations as $destination)
          <a
            href="{{ url('/hotels') }}"
            class="group relative h-64 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow block"
          >
            <img
              src="{{ $destination['image'] }}"
              alt="{{ $destination['name'] }}"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
              <h3 class="text-2xl font-bold mb-1">{{ $destination['name'] }}</h3>
              <p class="text-sm">{{ $destination['hotels'] }} Hotels</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ── Testimonials ─────────────────────────────────────────────────── --}}
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Guests Say</h2>
        <p class="text-lg text-gray-600">Read reviews from thousands of satisfied customers</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($testimonials as $testimonial)
          <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center space-x-1 mb-4">
              @for($i = 0; $i < $testimonial['rating']; $i++)
                <x-icon name="star" class="w-5 h-5 fill-yellow-400 text-yellow-400" />
              @endfor
            </div>
            <p class="text-gray-700 mb-6">"{{ $testimonial['text'] }}"</p>
            <div class="flex items-center space-x-4">
              <img
                src="{{ $testimonial['avatar'] }}"
                alt="{{ $testimonial['name'] }}"
                class="w-12 h-12 rounded-full object-cover"
              />
              <div>
                <p class="font-semibold text-gray-900">{{ $testimonial['name'] }}</p>
                <p class="text-sm text-gray-600">{{ $testimonial['location'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ── CTA Section ──────────────────────────────────────────────────── --}}
  <section class="py-16 bg-blue-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-4xl font-bold mb-4">Ready to Book Your Dream Vacation?</h2>
      <p class="text-xl mb-8 text-blue-100">
        Join thousands of happy travelers who trust LuxStay for their accommodation needs.
      </p>
      <a
        href="{{ url('/register') }}"
        class="inline-block bg-white text-blue-900 px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors font-semibold"
      >
        Get Started Today
      </a>
    </div>
  </section>

</x-layouts.app>
