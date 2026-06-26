<x-layout>
    <x-slot:title>Home</x-slot:title>
    <div>
        <section
            class="relative h-[600px] bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=1600');">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Find Your Perfect Stay</h1>
                <p class="text-xl text-white mb-12 max-w-2xl">
                    Discover luxury hotels and resorts worldwide. Book your dream vacation with exclusive deals and unbeatable prices.
                </p>
                {{-- <div class="w-full max-w-5xl">
                    <form method="GET" action="{{ url('/hotels') }}" class="bg-white rounded-2xl shadow-2xl p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Destination</label>
                                <div class="relative">
                                    <i data-lucide="map-pin" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input type="text" name="destination" placeholder="Where are you going?"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Check-in Date</label>
                                <div class="relative">
                                    <i data-lucide="calendar" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input type="date" name="check_in"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Check-out Date</label>
                                <div class="relative">
                                    <i data-lucide="calendar" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input type="date" name="check_out"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Number of Guests</label>
                                <div class="relative">
                                    <i data-lucide="users" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <select name="guests"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent appearance-none">
                                        <option value="1">1 Guest</option>
                                        <option value="2">2 Guests</option>
                                        <option value="3">3 Guests</option>
                                        <option value="4">4 Guests</option>
                                        <option value="5">5+ Guests</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Budget per Night</label>
                                <div class="relative">
                                    <i data-lucide="dollar-sign" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <select name="budget"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent appearance-none">
                                        <option value="100">Under $100</option>
                                        <option value="200">$100 - $200</option>
                                        <option value="300">$200 - $300</option>
                                        <option value="500">$300 - $500</option>
                                        <option value="1000">$500+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-end">
                                <x-button type="submit" icon="search" block>Search Hotels</x-button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <x-button href="/hotels" size="lg">Browse Hotels</x-button>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="award" class="w-8 h-8 text-blue-900"></i>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Best Price Guarantee</h3>
                        <p class="text-gray-600 text-sm">Find the lowest prices or we'll refund the difference</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="shield" class="w-8 h-8 text-blue-900"></i>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">Secure Booking</h3>
                        <p class="text-gray-600 text-sm">Your information is protected with 256-bit encryption</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="headphones" class="w-8 h-8 text-blue-900"></i>
                        </div>
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">24/7 Support</h3>
                        <p class="text-gray-600 text-sm">Our team is here to help you anytime, anywhere</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="star" class="w-8 h-8 text-blue-900"></i>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach(array_slice($featuredHotels, 0, 6) as $hotel)
                        <x-hotel-card :hotel="$hotel" />
                    @endforeach
                </div>
                <div class="text-center mt-10">
<x-button href="{{ url('/hotels') }}" size="lg">View All Hotels</x-button>
                </div>
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
                    <a href="{{ url('/hotels') }}"
                       class="group relative h-64 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow">
                        <img src="{{ $destination['image'] }}" alt="{{ $destination['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($testimonials as $testimonial)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-center space-x-1 mb-4">
                            @for($i = 0; $i < $testimonial['rating']; $i++)
                            <svg class="w-5 h-5 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-700 mb-6">"{{ $testimonial['text'] }}"</p>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}"
                                 class="w-12 h-12 rounded-full object-cover">
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
                    Join thousands of happy travelers who trust LuxHotel for their accommodation needs.
                </p>
<x-button href="{{ url('/register') }}" variant="inverted" size="lg">Get Started Today</x-button>
            </div>
        </section>
    </div>
</x-layout>
