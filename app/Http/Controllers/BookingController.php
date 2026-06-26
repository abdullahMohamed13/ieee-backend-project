<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(string $id)
    {
        $hotels = (new HotelsController)->getHotels();
        $hotel = collect($hotels)->firstWhere('id', (int) $id);

        if (!$hotel) {
            abort(404);
        }

        return view('booking.create', ['hotel' => $hotel]);
    }

    public function store(Request $request, string $id)
    {
        $hotels = (new HotelsController)->getHotels();
        $hotel = collect($hotels)->firstWhere('id', (int) $id);

        if (!$hotel) {
            abort(404);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:10',
            'room_type' => 'required|string',
        ]);

        return redirect('/dashboard')
            ->with('success', 'Booking confirmed! You will receive a confirmation email shortly.');
    }
}
