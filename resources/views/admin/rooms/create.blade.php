<x-layout>
<x-slot:title>Add Room - {{ $hotel->name }}</x-slot:title>
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-900">Admin Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.hotels') }}" class="hover:text-blue-900">Hotels</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.rooms.index', $hotel) }}" class="hover:text-blue-900">{{ $hotel->name }} - Rooms</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">Add Room</span>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Add New Room</h2>

            <form action="{{ route('admin.rooms.store', $hotel) }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="room_number" class="block text-sm font-semibold text-gray-700 mb-2">Room Number</label>
                    <input type="text" name="room_number" id="room_number" value="{{ old('room_number') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900 @error('room_number') border-red-500 @enderror">
                    @error('room_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price per Night</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900 @error('price') border-red-500 @enderror">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="capacity" class="block text-sm font-semibold text-gray-700 mb-2">Capacity</label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900 @error('capacity') border-red-500 @enderror">
                    @error('capacity')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900 @error('status') border-red-500 @enderror">
                        <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Available</option>
                        <option value="booked" {{ old('status') === 'booked' ? 'selected' : '' }}>Booked</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.rooms.index', $hotel) }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-semibold transition-colors">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 font-semibold transition-colors">Create Room</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>
