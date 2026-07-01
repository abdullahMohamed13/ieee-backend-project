<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function show($hotelId)
    {
        $hotel = Hotel::where('is_active', true)->findOrFail($hotelId);

        $hotelData = [
            'id'       => $hotel->id,
            'name'     => $hotel->name,
            'location' => $hotel->location,
            'price'    => $hotel->price,
            'image'    => $hotel->image,
        ];

        return view('pages.booking', compact('hotelData'))->with('hotel', $hotelData);
    }

    public function confirm(Request $request, $hotelId)
    {
        $validator = Validator::make($request->all(), [
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|email',
            'phone'            => 'required|string',
            'check_in'         => 'required|date|after_or_equal:today',
            'check_out'        => 'required|date|after:check_in',
            'guests'           => 'required|integer|min:1|max:10',
            'room_type'        => 'required|string',
            'address'          => 'nullable|string',
            'special_requests' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hotel = Hotel::findOrFail($hotelId);
        
        // Calculate nights and pricing
        $nights   = Booking::calculateNights($request->check_in, $request->check_out);
        $pricing  = Booking::calculatePrice($hotel->price, $nights);

        // Create booking
        $booking = Booking::create([
            'user_id'          => auth()->id(),
            'hotel_id'         => $hotel->id,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'address'          => $request->address,
            'check_in'         => $request->check_in,
            'check_out'        => $request->check_out,
            'guests'           => $request->guests,
            'room_type'        => $request->room_type,
            'special_requests' => $request->special_requests,
            'nights'           => $nights,
            'subtotal'         => $pricing['subtotal'],
            'taxes'            => $pricing['taxes'],
            'total_price'      => $pricing['total'],
            'status'           => 'confirmed',
            'payment_status'   => 'paid',
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking confirmed successfully! Booking ID: #' . $booking->id);
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        // Check if user owns this booking
        if (auth()->id() !== $booking->user_id && !auth()->user()->isAdmin()) {
            return redirect()->back()->with('error', 'You do not have permission to cancel this booking.');
        }

        $booking->update([
            'status'         => 'cancelled',
            'payment_status' => 'refunded',
        ]);

        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }
}
