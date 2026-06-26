<x-layout>
<x-slot:title>Hotel Management</x-slot:title>
@php
    $searchTerm = request('search', '');
    $filteredHotels = $searchTerm ? array_filter($hotels, fn($h) => stripos($h['name'], $searchTerm) !== false || stripos($h['city'], $searchTerm) !== false) : $hotels;
@endphp
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Hotel Management</h1>
                <p class="text-gray-600">Manage all hotel properties</p>
            </div>
            <div class="mt-4 md:mt-0">
                <x-button icon="plus">Add New Hotel</x-button>
            </div>
        </div>

        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ url('/admin') }}" class="hover:text-blue-900">Admin Dashboard</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">Hotel Management</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="md:col-span-3">
                <form method="GET" action="{{ url('/admin/hotels') }}">
                    <div class="relative">
                        <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <input type="text" name="search" placeholder="Search hotels by name or city..." value="{{ $searchTerm }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
                    </div>
                </form>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-600 mb-1">Total Hotels</p>
                <p class="text-3xl font-bold text-blue-900">{{ count($hotels) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Hotel</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Location</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Rating</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Price/Night</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Rooms</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Status</th>
                            <th class="text-right py-4 px-6 font-semibold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredHotels as $hotel)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $hotel['image'] }}" alt="{{ $hotel['name'] }}" class="w-12 h-12 rounded-lg object-cover">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $hotel['name'] }}</p>
                                        @if($hotel['featured'] ?? false)
                                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-600">{{ $hotel['city'] }}</td>
                            <td class="py-4 px-6">
                                <span class="font-semibold">{{ $hotel['rating'] }}</span>
                                <span class="text-yellow-400 ml-1">&starf;</span>
                            </td>
                            <td class="py-4 px-6 font-semibold text-blue-900">${{ $hotel['price'] }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $hotel['rooms'] ?? '-' }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Active</span>
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
