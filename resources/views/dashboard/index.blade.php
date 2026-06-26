<x-layout>
<x-slot:title>My Dashboard</x-slot:title>
@php
    $tabs = ['bookings', 'favorites', 'profile', 'settings'];
    $activeTab = request('tab', 'bookings');
@endphp
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
                            <i data-lucide="user" class="w-10 h-10 text-white"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ auth()->user()->name ?? 'John Smith' }}</h3>
                        <p class="text-sm text-gray-600">{{ auth()->user()->email ?? 'john.smith@example.com' }}</p>
                    </div>

                    <nav class="space-y-2">
                        @foreach(['bookings' => 'Calendar', 'favorites' => 'Heart', 'profile' => 'User', 'settings' => 'Settings'] as $tab => $icon)
                        <a href="{{ url('/dashboard?tab=' . $tab) }}"
                           class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ $activeTab === $tab ? 'bg-blue-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i data-lucide="{{ $icon }}" class="w-5 h-5"></i>
                            <span>{{ ucfirst($tab) }}</span>
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
                                            <h3 class="font-semibold text-lg text-gray-900">{{ $booking['hotel_name'] }}</h3>
                                            @php
                                                $statusColors = ['confirmed' => 'bg-green-100 text-green-800', 'pending' => 'bg-yellow-100 text-yellow-800', 'cancelled' => 'bg-red-100 text-red-800'];
                                                $statusIcons = ['confirmed' => 'check-circle', 'pending' => 'clock', 'cancelled' => 'x-circle'];
                                            @endphp
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold flex items-center space-x-1 {{ $statusColors[$booking['status']] ?? 'bg-gray-100 text-gray-800' }}">
                                                <i data-lucide="{{ $statusIcons[$booking['status']] ?? '' }}" class="w-4 h-4"></i>
                                                <span class="capitalize">{{ $booking['status'] }}</span>
                                            </span>
                                        </div>
                                        <div class="space-y-1 text-sm text-gray-600">
                                            <div class="flex items-center space-x-2">
                                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                                <span>{{ $booking['check_in'] }} - {{ $booking['check_out'] }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <i data-lucide="users" class="w-4 h-4"></i>
                                                <span>{{ $booking['guests'] }} Guests &bull; {{ $booking['room_type'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-blue-900">${{ $booking['total_price'] }}</p>
                                        <a href="{{ url('/hotels/' . $booking['hotel_id']) }}" class="text-sm text-blue-900 hover:underline">View Details</a>
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
                                        <td class="py-4 px-4">{{ $booking['hotel_name'] }}</td>
                                        <td class="py-4 px-4 text-gray-600">{{ $booking['check_in'] }}</td>
                                        <td class="py-4 px-4 font-semibold">${{ $booking['total_price'] }}</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $statusColors[$booking['status']] ?? 'bg-gray-100 text-gray-800' }}">{{ $booking['status'] }}</span>
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
                            <img src="{{ $hotel['image'] }}" alt="{{ $hotel['name'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $hotel['name'] }}</h3>
                                <div class="flex items-center text-gray-600 mb-3 text-sm">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-1"></i>
                                    <span>{{ $hotel['location'] }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-blue-900">${{ $hotel['price'] }}/night</span>
                                    <x-button href="{{ url('/hotels/' . $hotel['id']) }}" size="sm">Book Now</x-button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @elseif($activeTab === 'profile')
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Profile Information</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-input name="first_name" value="John" placeholder="First Name" />
                            <x-input name="last_name" value="Smith" placeholder="Last Name" />
                        </div>
                        <x-input type="email" name="email" value="john.smith@example.com" placeholder="Email Address" />
                        <x-input type="tel" name="phone" value="+1 (555) 123-4567" placeholder="Phone Number" />
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                            <textarea rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent">123 Main Street, New York, NY 10001</textarea>
                        </div>
                        <x-button type="submit">Save Changes</x-button>
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
                                        <input type="checkbox" checked class="w-4 h-4 text-blue-900 border-gray-300 rounded">
                                        <span class="ml-3 text-gray-700">Booking confirmations</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" checked class="w-4 h-4 text-blue-900 border-gray-300 rounded">
                                        <span class="ml-3 text-gray-700">Special offers and promotions</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="w-4 h-4 text-blue-900 border-gray-300 rounded">
                                        <span class="ml-3 text-gray-700">Newsletter</span>
                                    </label>
                                </div>
                            </div>
                            <div class="border-t pt-6">
                                <h3 class="font-semibold text-gray-900 mb-4">Change Password</h3>
                                <div class="space-y-4">
                                    <x-input type="password" name="current_password" placeholder="Current password" />
                                    <x-input type="password" name="new_password" placeholder="New password" />
                                    <x-input type="password" name="new_password_confirmation" placeholder="Confirm new password" />
                                    <x-button type="submit">Update Password</x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-layout>
