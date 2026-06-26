<x-layout>
<x-slot:title>Booking Management</x-slot:title>
@php
    $searchTerm = request('search', '');
    $statusFilter = request('status', 'all');
    $filteredBookings = array_filter($bookings, function($b) use ($searchTerm, $statusFilter) {
        $matchesSearch = !$searchTerm || stripos($b['hotel_name'], $searchTerm) !== false || stripos($b['user_name'], $searchTerm) !== false || stripos($b['id'], $searchTerm) !== false;
        $matchesStatus = $statusFilter === 'all' || $b['status'] === $statusFilter;
        return $matchesSearch && $matchesStatus;
    });
@endphp
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Booking Management</h1>
            <p class="text-gray-600">View and manage all bookings</p>
        </div>

        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ url('/admin') }}" class="hover:text-blue-900">Admin Dashboard</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">Booking Management</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-600 mb-1">Total Bookings</p>
                <p class="text-3xl font-bold text-blue-900">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-600 mb-1">Confirmed</p>
                <p class="text-3xl font-bold text-green-600">{{ $stats['confirmed'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-600 mb-1">Pending</p>
                <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-600 mb-1">Cancelled</p>
                <p class="text-3xl font-bold text-red-600">{{ $stats['cancelled'] }}</p>
            </div>
        </div>

        <form method="GET" action="{{ url('/admin/bookings') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="md:col-span-2">
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="text" name="search" placeholder="Search by booking ID, hotel name, or guest name..." value="{{ $searchTerm }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                </div>
            </div>
            <div>
                <div class="relative">
                    <i data-lucide="filter" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <select name="status" onchange="this.form.submit()" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900 appearance-none">
                        <option value="all" {{ $statusFilter === 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="confirmed" {{ $statusFilter === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="pending" {{ $statusFilter === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="cancelled" {{ $statusFilter === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Booking ID</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Hotel</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Guest</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Check-in</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Check-out</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Guests</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Amount</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Status</th>
                            <th class="text-right py-4 px-6 font-semibold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredBookings as $booking)
                        @php
                            $sc = $booking['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : ($booking['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800');
                        @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 font-medium">#{{ $booking['id'] }}</td>
                            <td class="py-4 px-6">
                                <p class="font-medium text-gray-900">{{ $booking['hotel_name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $booking['room_type'] }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-medium text-gray-900">{{ $booking['user_name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $booking['user_email'] }}</p>
                            </td>
                            <td class="py-4 px-6 text-gray-600">{{ $booking['check_in'] }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $booking['check_out'] }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $booking['guests'] }}</td>
                            <td class="py-4 px-6 font-semibold text-blue-900">${{ $booking['total_price'] }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize {{ $sc }}">{{ $booking['status'] }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="p-2 text-blue-900 hover:bg-blue-50 rounded-lg transition-colors" title="View Details">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </button>
                                    @if($booking['status'] === 'pending')
                                    <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Approve">
                                        <i data-lucide="check" class="w-5 h-5"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Reject">
                                        <i data-lucide="x" class="w-5 h-5"></i>
                                    </button>
                                    @endif
                                </div>
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
