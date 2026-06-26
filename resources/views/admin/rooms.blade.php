<x-layout>
<x-slot:title>Room Management</x-slot:title>
@php
    $searchTerm = request('search', '');
    $filteredRooms = $searchTerm ? array_filter($rooms, function($room) use ($hotels, $searchTerm) {
        $hotelName = collect($hotels)->firstWhere('id', (int) $room['hotel_id'])['name'] ?? '';
        return stripos($hotelName, $searchTerm) !== false || stripos($room['type'], $searchTerm) !== false;
    }) : $rooms;
@endphp
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Room Management</h1>
                <p class="text-gray-600">Manage room types and pricing</p>
            </div>
            <div class="mt-4 md:mt-0">
                <x-button icon="plus">Add New Room</x-button>
            </div>
        </div>

        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ url('/admin') }}" class="hover:text-blue-900">Admin Dashboard</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">Room Management</span>
        </div>

        <div class="mb-8">
            <form method="GET" action="{{ url('/admin/rooms') }}">
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="text" name="search" placeholder="Search rooms by hotel or type..." value="{{ $searchTerm }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Hotel</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Room Type</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Capacity</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Price/Night</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Amenities</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Status</th>
                            <th class="text-right py-4 px-6 font-semibold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredRooms as $room)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <p class="font-medium text-gray-900">{{ collect($hotels)->firstWhere('id', (int) $room['hotel_id'])['name'] ?? 'Unknown Hotel' }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-medium text-gray-900">{{ $room['type'] }}</p>
                            </td>
                            <td class="py-4 px-6 text-gray-600">{{ $room['capacity'] }} Guests</td>
                            <td class="py-4 px-6 font-semibold text-blue-900">${{ $room['price'] }}</td>
                            <td class="py-4 px-6">
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($room['amenities'] ?? [], 0, 2) as $amenity)
                                    <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">{{ $amenity }}</span>
                                    @endforeach
                                    @if(count($room['amenities'] ?? []) > 2)
                                    <span class="text-xs text-gray-500">+{{ count($room['amenities']) - 2 }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $room['available'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $room['available'] ? 'Available' : 'Booked' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-end space-x-2">
                                    <button class="p-2 text-blue-900 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i data-lucide="pencil" class="w-5 h-5"></i>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
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
