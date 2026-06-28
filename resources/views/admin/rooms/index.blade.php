<x-layout>
<x-slot:title>Rooms - {{ $hotel->name }}</x-slot:title>
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Room Management</h1>
                <p class="text-gray-600">{{ $hotel->name }}</p>
            </div>
            <div class="mt-4 md:mt-0">
                <x-button icon="plus" href="{{ route('admin.rooms.create', $hotel) }}">Add New Room</x-button>
            </div>
        </div>

        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-900">Admin Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.hotels') }}" class="hover:text-blue-900">Hotels</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $hotel->name }} - Rooms</span>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Room Number</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Price/Night</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Capacity</th>
                            <th class="text-left py-4 px-6 font-semibold text-gray-900">Status</th>
                            <th class="text-right py-4 px-6 font-semibold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 font-medium text-gray-900">{{ $room->room_number }}</td>
                            <td class="py-4 px-6 font-semibold text-blue-900">${{ number_format($room->price, 2) }}</td>
                            <td class="py-4 px-6 text-gray-600">{{ $room->capacity }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $room->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.rooms.edit', [$hotel, $room]) }}" class="p-2 text-blue-900 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i data-lucide="pencil" class="w-5 h-5"></i>
                                    </a>
                                    <form action="{{ route('admin.rooms.destroy', [$hotel, $room]) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">No rooms found for this hotel.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-layout>
