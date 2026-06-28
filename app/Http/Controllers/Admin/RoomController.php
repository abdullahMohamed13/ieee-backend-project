<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Hotel $hotel)
    {
        $rooms = $hotel->rooms()->get();
        return view('admin.rooms.index', compact('hotel', 'rooms'));
    }

    public function create(Hotel $hotel)
    {
        return view('admin.rooms.create', compact('hotel'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'room_number' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,booked',
        ]);

        $hotel->rooms()->create($validated);

        return redirect()->route('admin.rooms.index', $hotel)
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $hotel = $room->hotel;
        return view('admin.rooms.edit', compact('room', 'hotel'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:available,booked',
        ]);

        $room->update($validated);

        return redirect()->route('admin.rooms.index', $room->hotel)
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $hotel = $room->hotel;
        $room->delete();

        return redirect()->route('admin.rooms.index', $hotel)
            ->with('success', 'Room deleted successfully.');
    }
}
