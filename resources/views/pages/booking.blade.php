@php
  $allHotels = [
    ['id'=>'1','name'=>'Grand Luxury Hotel','location'=>'Downtown, New York','price'=>299,
     'image'=>'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800'],
    ['id'=>'2','name'=>'Seaside Resort & Spa','location'=>'Beachfront, Miami','price'=>349,
     'image'=>'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800'],
    ['id'=>'3','name'=>'Mountain View Lodge','location'=>'Aspen, Colorado','price'=>189,
     'image'=>'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800'],
    ['id'=>'4','name'=>'City Center Hotel','location'=>'Downtown, Chicago','price'=>159,
     'image'=>'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800'],
    ['id'=>'5','name'=>'Desert Oasis Resort','location'=>'Scottsdale, Arizona','price'=>279,
     'image'=>'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800'],
    ['id'=>'6','name'=>'Historic Downtown Inn','location'=>'French Quarter, New Orleans','price'=>139,
     'image'=>'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800'],
    ['id'=>'7','name'=>'Coastal Paradise Hotel','location'=>'Santa Monica, California','price'=>319,
     'image'=>'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800'],
    ['id'=>'8','name'=>'Urban Boutique Hotel','location'=>'SoHo, New York','price'=>229,
     'image'=>'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800'],
  ];

  $hotelId = request()->segment(2, '1');
  $hotel   = collect($allHotels)->firstWhere('id', $hotelId);

  $nights   = 3;
  $subtotal = $hotel ? $hotel['price'] * $nights : 0;
  $taxes    = round($subtotal * 0.15, 2);
  $total    = round($subtotal + $taxes, 2);
@endphp

<x-layouts.app title="Complete Your Booking – LuxStay" description="Finish your hotel reservation on LuxStay.">

  @if(!$hotel)
    <div class="py-16 text-center">
      <h2 class="text-2xl font-bold text-gray-900">Hotel not found</h2>
    </div>
  @else

    <div class="py-8 bg-gray-50 min-h-screen">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Complete Your Booking</h1>

        <form action="{{ url('/booking/' . $hotel['id'] . '/confirm') }}" method="POST">
          @csrf
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- ── Main Form ─────────────────────────────────────────── --}}
            <div class="lg:col-span-2 space-y-6">

              {{-- Guest Information --}}
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Guest Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                    <div class="relative">
                      <x-icon name="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="text" name="first_name" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                    <div class="relative">
                      <x-icon name="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="text" name="last_name" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                    <div class="relative">
                      <x-icon name="mail" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="email" name="email" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                    <div class="relative">
                      <x-icon name="phone" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="tel" name="phone" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <div class="relative">
                      <x-icon name="map-pin" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="text" name="address"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                </div>
              </div>

              {{-- Booking Details --}}
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Booking Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-in Date *</label>
                    <div class="relative">
                      <x-icon name="calendar" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="date" name="check_in" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Check-out Date *</label>
                    <div class="relative">
                      <x-icon name="calendar" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="date" name="check_out" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Number of Guests *</label>
                    <div class="relative">
                      <x-icon name="users" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <select name="guests" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                        <option value="1">1 Guest</option>
                        <option value="2" selected>2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Room Type *</label>
                    <select name="room_type" required
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                      <option value="Deluxe King">Deluxe King</option>
                      <option value="Executive Suite">Executive Suite</option>
                      <option value="Presidential Suite">Presidential Suite</option>
                    </select>
                  </div>

                  <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests</label>
                    <textarea name="special_requests" rows="3"
                      placeholder="Any special requests or requirements..."
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"></textarea>
                  </div>

                </div>
              </div>

              {{-- Payment Information --}}
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Payment Information</h2>
                <div class="grid grid-cols-1 gap-4">

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Card Number *</label>
                    <div class="relative">
                      <x-icon name="credit-card" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input type="text" name="card_number" required placeholder="1234 5678 9012 3456"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name *</label>
                    <input type="text" name="card_name" required placeholder="John Doe"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                  </div>

                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date *</label>
                      <input type="text" name="expiry_date" required placeholder="MM/YY"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-2">CVV *</label>
                      <input type="text" name="cvv" required placeholder="123"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                    </div>
                  </div>

                </div>
              </div>
            </div>

            {{-- ── Booking Summary ───────────────────────────────────── --}}
            <div class="lg:col-span-1">
              <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Booking Summary</h3>
                <div class="mb-4">
                  <img
                    src="{{ $hotel['image'] }}"
                    alt="{{ $hotel['name'] }}"
                    class="w-full h-40 object-cover rounded-lg mb-4"
                  />
                  <h4 class="font-semibold text-gray-900">{{ $hotel['name'] }}</h4>
                  <p class="text-sm text-gray-600">{{ $hotel['location'] }}</p>
                </div>
                <div class="space-y-3 py-4 border-t border-b">
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Check-in</span>
                    <span class="font-medium">Jul 15, 2026</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Check-out</span>
                    <span class="font-medium">Jul 18, 2026</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Guests</span>
                    <span class="font-medium">2 Adults</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Room Type</span>
                    <span class="font-medium">Deluxe King</span>
                  </div>
                </div>
                <div class="space-y-3 py-4">
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">${{ $hotel['price'] }} × {{ $nights }} nights</span>
                    <span class="font-medium">${{ $subtotal }}</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Taxes & Fees</span>
                    <span class="font-medium">${{ $taxes }}</span>
                  </div>
                </div>
                <div class="flex justify-between items-center pt-4 border-t">
                  <span class="font-bold text-lg text-gray-900">Total</span>
                  <span class="font-bold text-2xl text-blue-900">${{ $total }}</span>
                </div>
                <button
                  type="submit"
                  class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold mt-6"
                >
                  Confirm Booking
                </button>
                <p class="text-xs text-gray-600 text-center mt-4">
                  By confirming, you agree to our Terms &amp; Conditions
                </p>
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  @endif

</x-layouts.app>
