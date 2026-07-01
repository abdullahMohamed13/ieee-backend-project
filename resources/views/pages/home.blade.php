

<x-layouts.app title="LuxStay – Find Your Perfect Stay" description="Discover luxury hotels and resorts worldwide. Book your dream vacation with exclusive deals.">

  <section
    class="relative py-16 md:py-32 bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1600'), linear-gradient(135deg, #1e3a8a, #0f172a);"
  >
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(30, 58, 138, 0.7), rgba(15, 23, 42, 0.5));"></div>
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

  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 justify-items-center">

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ url('images/dollar.png') }}" alt="Best Price" class="w-8 h-8" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Best Price Guarantee</h3>
          <p class="text-gray-600 text-sm">Find the lowest prices or we'll refund the difference</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ url('images/check.png') }}" alt="Secure" class="w-8 h-8" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Secure Booking</h3>
          <p class="text-gray-600 text-sm">Your information is protected with 256-bit encryption</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ url('images/bell.png') }}" alt="Support" class="w-8 h-8" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">24/7 Support</h3>
          <p class="text-gray-600 text-sm">Our team is here to help you anytime, anywhere</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="{{ url('images/booking.png') }}" alt="Premium" class="w-8 h-8" />
          </div>
          <h3 class="font-semibold text-lg text-gray-900 mb-2">Premium Selection</h3>
          <p class="text-gray-600 text-sm">Handpicked luxury hotels and exclusive properties</p>
        </div>

      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Hotels</h2>
        <p class="text-lg text-gray-600">Explore our handpicked selection of luxury accommodations</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
        @forelse($hotels as $hotel)
          <x-hotel-card :hotel="$hotel" />
        @empty
          <div class="col-span-full text-center py-8">
            <img src="{{ url('logo-with-text.png') }}" alt="LuxStay" class="mx-auto mb-4" style="height:60%;opacity: 0.4;" />
            <h3 class="text-2xl font-semibold text-gray-500 mb-2">It look like we ran out of hotels 😪</h3>
            <p class="text-gray-400">Check back later for new listings.</p>
          </div>
        @endforelse
      </div>
      @if(count($hotels))
        <div class="text-center mt-10">
          <x-button href="{{ url('/hotels') }}" variant="primary" size="lg">View All Hotels</x-button>
        </div>
      @endif
    </div>
  </section>

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
            class="group relative w-full rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow block"
          >
            <img
              src="{{ $destination['image'] }}"
              alt="{{ $destination['name'] }}"
              class="w-full h-full group-hover:scale-110 transition-transform duration-300"
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

  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Guests Say</h2>
        <p class="text-lg text-gray-600">Read reviews from thousands of satisfied customers</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
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

  <section class="py-16 bg-blue-900 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-4xl font-bold mb-4">Ready to Book Your Dream Vacation?</h2>
      <p class="text-xl mb-8 text-blue-100">
        Join thousands of happy travelers who trust LuxStay for their accommodation needs.
      </p>
      <x-button href="{{ url('/register') }}" variant="inverted" size="lg">Get Started Today</x-button>
    </div>
  </section>

</x-layouts.app>
