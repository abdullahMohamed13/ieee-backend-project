@php
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

  $user = auth()->user();
@endphp

<x-layouts.app title="My Dashboard – LuxStay" description="Manage your bookings and account settings on LuxStay.">

  <div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">My Dashboard</h1>
        <p class="text-gray-600">Manage your bookings and account settings</p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        <aside class="lg:col-span-1">
          <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="text-center mb-6 pb-6 border-b">
              <div class="w-20 h-20 bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                <x-icon name="user" class="w-10 h-10 text-white" />
              </div>
              <h3 class="font-semibold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h3>
              <p class="text-sm text-gray-600">{{ $user->email }}</p>
            </div>

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

        <div class="lg:col-span-3">

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
                        <x-button href="{{ url('/hotels/' . $hotel['id']) }}" variant="primary" size="sm">Book Now</x-button>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

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
                  <input type="tel" name="phone" value="+20 (101) 0434 465"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                  <textarea name="address" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">123 Main Street, New York, NY 10001</textarea>
                </div>
                <x-button type="submit" variant="primary">Save Changes</x-button>
              </form>
            </div>

          @elseif($activeTab === 'settings')
            <div class="space-y-6">
              <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Account Settings</h2>
                <div class="space-y-6">
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
                      <x-button type="submit" variant="primary">Update Password</x-button>
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
