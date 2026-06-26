<x-layout>
<x-slot:title>Admin Dashboard</x-slot:title>
@php
    $maxRevenue = max(array_column($revenueData, 'revenue'));
    $maxBookings = max(array_column($bookingTrends, 'bookings'));
@endphp
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
                <p class="text-gray-600">Welcome back! Here's what's happening today.</p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-4">
                <x-button href="{{ url('/admin/hotels') }}">Manage Hotels</x-button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Hotels</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['totalHotels'] }}</p>
                        <p class="text-sm mt-2 text-green-600">&uarr; 12% increase</p>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-900 flex items-center justify-center">
                        <i data-lucide="building-2" class="w-7 h-7"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Rooms</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['totalRooms'] }}</p>
                        <p class="text-sm mt-2 text-green-600">&uarr; 8% increase</p>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-green-100 text-green-900 flex items-center justify-center">
                        <i data-lucide="bed" class="w-7 h-7"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Bookings</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['totalBookings'] }}</p>
                        <p class="text-sm mt-2 text-green-600">&uarr; 23% increase</p>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-purple-100 text-purple-900 flex items-center justify-center">
                        <i data-lucide="calendar" class="w-7 h-7"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Revenue</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['revenue'] }}</p>
                        <p class="text-sm mt-2 text-green-600">&uarr; 15% increase</p>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-orange-100 text-orange-900 flex items-center justify-center">
                        <i data-lucide="dollar-sign" class="w-7 h-7"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Monthly Revenue</h3>
                <div class="flex items-end space-x-2 h-64">
                    @foreach($revenueData as $item)
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-full bg-blue-900 rounded-t" style="height: {{ ($item['revenue'] / $maxRevenue) * 100 }}%"></div>
                        <span class="text-xs text-gray-600 mt-2">{{ $item['month'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Booking Trends</h3>
                <div class="flex items-end space-x-2 h-64">
                    @foreach($bookingTrends as $item)
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-full bg-blue-900/70 rounded-t" style="height: {{ ($item['bookings'] / $maxBookings) * 100 }}%"></div>
                        <span class="text-xs text-gray-600 mt-2">{{ $item['month'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-900">Occupancy Rate</h3>
                    <i data-lucide="trending-up" class="w-5 h-5 text-green-600"></i>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['occupancyRate'] }}</p>
                <p class="text-sm text-gray-600">Average across all properties</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-900">Avg. Booking Value</h3>
                    <i data-lucide="dollar-sign" class="w-5 h-5 text-blue-600"></i>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['avgBookingValue'] }}</p>
                <p class="text-sm text-gray-600">Per booking this month</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-900">Active Customers</h3>
                    <i data-lucide="users" class="w-5 h-5 text-purple-600"></i>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['activeCustomers'] }}</p>
                <p class="text-sm text-gray-600">Registered users</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Recent Bookings</h3>
                <a href="{{ url('/admin/bookings') }}" class="text-blue-900 hover:text-blue-700 font-semibold text-sm">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Booking ID</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Hotel</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Guest</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Check-in</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Amount</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-900">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-4 font-medium">#{{ $booking['id'] }}</td>
                            <td class="py-4 px-4">{{ $booking['hotel_name'] }}</td>
                            <td class="py-4 px-4">{{ $booking['user_name'] }}</td>
                            <td class="py-4 px-4 text-gray-600">{{ $booking['check_in'] }}</td>
                            <td class="py-4 px-4 font-semibold">${{ $booking['total_price'] }}</td>
                            <td class="py-4 px-4">
                                @php
                                    $sc = $booking['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : ($booking['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800');
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $sc }}">{{ $booking['status'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-layout>
