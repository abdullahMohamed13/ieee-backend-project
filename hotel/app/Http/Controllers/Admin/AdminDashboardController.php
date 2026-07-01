<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        // Get statistics
        $totalHotels   = Hotel::count();
        $totalRooms    = Room::count();
        $totalBookings = Booking::count();
        $totalUsers    = User::where('role', 'user')->count();
        $totalRevenue  = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_price');

        // Recent bookings
        $bookings = Booking::with(['hotel', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
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

        // Revenue data (monthly)
        $revenueData = [
            ['month' => 'Jan', 'revenue' => 45000],
            ['month' => 'Feb', 'revenue' => 52000],
            ['month' => 'Mar', 'revenue' => 48000],
            ['month' => 'Apr', 'revenue' => 61000],
            ['month' => 'May', 'revenue' => 55000],
            ['month' => 'Jun', 'revenue' => 67000],
        ];

        // Booking trends (monthly)
        $bookingTrends = [
            ['month' => 'Jan', 'bookings' => 142],
            ['month' => 'Feb', 'bookings' => 165],
            ['month' => 'Mar', 'bookings' => 138],
            ['month' => 'Apr', 'bookings' => 189],
            ['month' => 'May', 'bookings' => 176],
            ['month' => 'Jun', 'bookings' => 208],
        ];

        return view('pages.admin', compact(
            'totalHotels',
            'totalRooms',
            'totalBookings',
            'totalUsers',
            'totalRevenue',
            'bookings',
            'revenueData',
            'bookingTrends'
        ));
    }
}
