@php
  // ── Mock data ─────────────────────────────────────────────────────────────
  $bookings = [
    ['id'=>'b1','hotelId'=>'1','hotelName'=>'Grand Luxury Hotel','roomType'=>'Deluxe King',
     'checkIn'=>'2026-07-15','checkOut'=>'2026-07-18','guests'=>2,'totalPrice'=>897,
     'status'=>'confirmed','userName'=>'John Smith','userEmail'=>'john.smith@example.com'],
    ['id'=>'b2','hotelId'=>'2','hotelName'=>'Seaside Resort & Spa','roomType'=>'Ocean View Room',
     'checkIn'=>'2026-08-01','checkOut'=>'2026-08-05','guests'=>2,'totalPrice'=>1396,
     'status'=>'pending','userName'=>'Sarah Johnson','userEmail'=>'sarah.j@example.com'],
    ['id'=>'b3','hotelId'=>'3','hotelName'=>'Mountain View Lodge','roomType'=>'Mountain View Room',
     'checkIn'=>'2026-07-20','checkOut'=>'2026-07-23','guests'=>3,'totalPrice'=>567,
     'status'=>'confirmed','userName'=>'Michael Brown','userEmail'=>'m.brown@example.com'],
    ['id'=>'b4','hotelId'=>'7','hotelName'=>'Coastal Paradise Hotel','roomType'=>'Beach Suite',
     'checkIn'=>'2026-09-10','checkOut'=>'2026-09-15','guests'=>4,'totalPrice'=>1595,
     'status'=>'confirmed','userName'=>'Emily Davis','userEmail'=>'emily.d@example.com'],
  ];

  $favoriteHotels = [
    ['id'=>'1','name'=>'Grand Luxury Hotel','location'=>'Downtown, New York','price'=>299,
     'image'=>'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800'],
    ['id'=>'2','name'=>'Seaside Resort & Spa','location'=>'Beachfront, Miami','price'=>349,
     'image'=>'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800'],
    ['id'=>'3','name'=>'Mountain View Lodge','location'=>'Aspen, Colorado','price'=>189,
     'image'=>'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800'],
  ];

  $activeTab = request('tab', 'bookings');

  $statusColors = [
    'confirmed' => 'bg-green-100 text-green-800',
    'pending'   => 'bg-yellow-100 text-yellow-800',
    'cancelled' => 'bg-red-100 text-red-800',
  ];
  $statusIcons = [
    'confirmed' => 'check-circle',
    'pending'   => 'clock',
    'cancelled' => 'x-circle',
  ];
@endphp

<x-layouts.app title="My Dashboard – LuxStay" description="Manage your bookings and account settings on LuxStay.">

  <div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- ── Header ──────────────────────────────────────────────────── --}}
      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">My Dashboard</h1>
        <p class="text-gray-600">Manage your bookings and account settings</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- ── Sidebar ──────────────────────────────────────────────── --}}
        <aside class="lg:col-span-1">
          <div class="bg-white rounded-xl shadow-lg p-6">
            {{-- User Profile --}}
            <div class="text-center mb-6 pb-6 border-b">
              <div class="w-20 h-20 bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                <x-icon name="user" class="w-10 h-10 text-white" />
              </div>
              <h3 class="font-semibold text-gray-900">John Smith</h3>
              <p class="text-sm text-gray-600">john.smith@example.com</p>
            </div>

            {{-- Navigation --}}
            <nav class="space-y-2">
              @foreach([
                ['tab'=>'bookings',  'label'=>'My Bookings', 'icon'=>'calendar'],
                ['tab'=>'favorites', 'label'=>'Favorites',   'icon'=>'heart'],
                ['tab'=>'profile',   'label'=>'Profile',     'icon'=>'user'],
                ['tab'=>'settings',  'label'=>'Settings',    'icon'=>'settings'],
              ] as $nav)
                <a
                  href="{{ url('/dashboard?tab=' . $nav['tab']) }}"
                  class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ $activeTab === $nav['tab'] ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}"
                >
                  <x-icon name="{{ $nav['icon'] }}" class="w-5 h-5" />
                  <span>{{ $nav['label'] }}</span>
                </a>
              @endforeach
            </nav>
          </div>
        </aside>

        {{-- ── Main Content ─────────────────────────────────────────── --}}
        <div class="lg:col-span-3">

          {{-- ─── My Bookings ─────────────────────────────────────── --}}
          @if($activeTab === 'bookings')
            <div class="space-y-6">
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">My Bookings</h2>
                <div class="space-y-4">
                  @foreach($bookings as $booking)
                    <div class="border rounded-lg p-6 hover:shadow-md transition-shadow">
                      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                          <div class="flex items-center space-x-2 mb-2">
                            <h3 class="font-semibold text-lg text-gray-900">{{ $booking['hotelName'] }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold flex items-center space-x-1 {{ $statusColors[$booking['status']] ?? 'bg-gray-100 text-gray-800' }}">
                              <x-icon name="{{ $statusIcons[$booking['status']] ?? 'info' }}" class="w-4 h-4" />
                              <span class="capitalize">{{ $booking['status'] }}</span>
                            </span>
                          </div>
                          <div class="space-y-1 text-sm text-gray-600">
                            <div class="flex items-center space-x-2">
                              <x-icon name="calendar" class="w-4 h-4" />
                              <span>{{ $booking['checkIn'] }} – {{ $booking['checkOut'] }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                              <x-icon name="users" class="w-4 h-4" />
                              <span>{{ $booking['guests'] }} Guests • {{ $booking['roomType'] }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="text-right">
                          <p class="text-2xl font-bold text-blue-900">${{ $booking['totalPrice'] }}</p>
                          <a href="{{ url('/hotels/' . $booking['hotelId']) }}" class="text-sm text-blue-900 hover:underline">
                            View Details
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              {{-- Booking History Table --}}
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Booking History</h2>
                <div class="overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="border-b">
                        <th class="text-left py-3 px-4 font-semibold text-gray-900">Hotel</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-900">Date</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-900">Amount</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bookings as $booking)
                        <tr class="border-b hover:bg-gray-50">
                          <td class="py-4 px-4">{{ $booking['hotelName'] }}</td>
                          <td class="py-4 px-4 text-gray-600">{{ $booking['checkIn'] }}</td>
                          <td class="py-4 px-4 font-semibold">${{ $booking['totalPrice'] }}</td>
                          <td class="py-4 px-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $statusColors[$booking['status']] ?? 'bg-gray-100 text-gray-800' }}">
                              {{ $booking['status'] }}
                            </span>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          {{-- ─── Favorites ────────────────────────────────────────── --}}
          @elseif($activeTab === 'favorites')
            <div class="bg-white rounded-xl shadow-lg p-6">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Favorite Hotels</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($favoriteHotels as $hotel)
                  <div class="border rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="{{ $hotel['image'] }}" alt="{{ $hotel['name'] }}" class="w-full h-48 object-cover" />
                    <div class="p-4">
                      <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $hotel['name'] }}</h3>
                      <div class="flex items-center text-gray-600 mb-3 text-sm">
                        <x-icon name="map-pin" class="w-4 h-4 mr-1" />
                        <span>{{ $hotel['location'] }}</span>
                      </div>
                      <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-blue-900">${{ $hotel['price'] }}/night</span>
                        <a
                          href="{{ url('/hotels/' . $hotel['id']) }}"
                          class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors text-sm"
                        >
                          Book Now
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

          {{-- ─── Profile ──────────────────────────────────────────── --}}
          @elseif($activeTab === 'profile')
            <div class="bg-white rounded-xl shadow-lg p-6">
              <h2 class="text-2xl font-bold text-gray-900 mb-6">Profile Information</h2>
              <form action="{{ url('/dashboard/profile') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input type="text" name="first_name" value="John"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <input type="text" name="last_name" value="Smith"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                  </div>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                  <input type="email" name="email" value="john.smith@example.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                  <input type="tel" name="phone" value="+1 (555) 123-4567"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                  <textarea name="address" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">123 Main Street, New York, NY 10001</textarea>
                </div>
                <button type="submit"
                  class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold">
                  Save Changes
                </button>
              </form>
            </div>

          {{-- ─── Settings ─────────────────────────────────────────── --}}
          @elseif($activeTab === 'settings')
            <div class="space-y-6">
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Account Settings</h2>
                <div class="space-y-6">
                  {{-- Email Preferences --}}
                  <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Email Preferences</h3>
                    <div class="space-y-3">
                      <label class="flex items-center">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-900 rounded" />
                        <span class="ml-3 text-gray-700">Booking confirmations</span>
                      </label>
                      <label class="flex items-center">
                        <input type="checkbox" checked class="w-4 h-4 text-blue-900 rounded" />
                        <span class="ml-3 text-gray-700">Special offers and promotions</span>
                      </label>
                      <label class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-900 rounded" />
                        <span class="ml-3 text-gray-700">Newsletter</span>
                      </label>
                    </div>
                  </div>

                  {{-- Change Password --}}
                  <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Change Password</h3>
                    <form action="{{ url('/dashboard/password') }}" method="POST" class="space-y-4">
                      @csrf
                      @method('PUT')
                      <input type="password" name="current_password" placeholder="Current password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                      <input type="password" name="password" placeholder="New password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                      <input type="password" name="password_confirmation" placeholder="Confirm new password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                      <button type="submit"
                        class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition-colors font-semibold">
                        Update Password
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

</x-layouts.app>
