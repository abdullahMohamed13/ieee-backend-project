<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $activeTab = $request->get('tab', 'bookings');

        // Get user's bookings
        $bookings = Booking::where('user_id', $user->id)
            ->with(['hotel'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($booking) {
                return [
                    'id'         => 'b' . $booking->id,
                    'hotelId'    => $booking->hotel_id,
                    'hotelName'  => $booking->hotel->name ?? 'N/A',
                    'roomType'   => $booking->room_type,
                    'checkIn'    => $booking->check_in->format('Y-m-d'),
                    'checkOut'   => $booking->check_out->format('Y-m-d'),
                    'guests'     => $booking->guests,
                    'totalPrice' => $booking->total_price,
                    'status'     => $booking->status,
                    'userName'   => $booking->guest_name,
                    'userEmail'  => $booking->email,
                ];
            });

        // Get favorite hotels (static for now - would normally be a favorites table)
        $favoriteHotels = Hotel::where('featured', true)
            ->where('is_active', true)
            ->limit(3)
            ->get()
            ->map(function ($hotel) {
                return [
                    'id'       => $hotel->id,
                    'name'     => $hotel->name,
                    'location' => $hotel->location,
                    'price'    => $hotel->price,
                    'image'    => $hotel->image,
                ];
            });

        return view('pages.dashboard', compact('bookings', 'favoriteHotels', 'activeTab'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'phone'      => 'nullable|string',
            'address'    => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->update($request->only(['first_name', 'last_name', 'email', 'phone', 'address']));

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'     => 'required',
            'password'             => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
