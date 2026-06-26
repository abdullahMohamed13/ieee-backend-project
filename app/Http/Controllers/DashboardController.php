<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = [
            [
                'id' => 'b1',
                'hotel_id' => 1,
                'hotel_name' => 'Grand Luxury Hotel',
                'room_type' => 'Deluxe King',
                'check_in' => '2026-07-15',
                'check_out' => '2026-07-18',
                'guests' => 2,
                'total_price' => 897,
                'status' => 'confirmed',
                'user_name' => 'John Smith',
                'user_email' => 'john.smith@example.com',
            ],
            [
                'id' => 'b2',
                'hotel_id' => 2,
                'hotel_name' => 'Seaside Resort & Spa',
                'room_type' => 'Ocean View Room',
                'check_in' => '2026-08-01',
                'check_out' => '2026-08-05',
                'guests' => 2,
                'total_price' => 1396,
                'status' => 'pending',
                'user_name' => 'Sarah Johnson',
                'user_email' => 'sarah.j@example.com',
            ],
            [
                'id' => 'b3',
                'hotel_id' => 3,
                'hotel_name' => 'Mountain View Lodge',
                'room_type' => 'Mountain View Room',
                'check_in' => '2026-07-20',
                'check_out' => '2026-07-23',
                'guests' => 3,
                'total_price' => 567,
                'status' => 'confirmed',
                'user_name' => 'Michael Brown',
                'user_email' => 'm.brown@example.com',
            ],
            [
                'id' => 'b4',
                'hotel_id' => 7,
                'hotel_name' => 'Coastal Paradise Hotel',
                'room_type' => 'Beach Suite',
                'check_in' => '2026-09-10',
                'check_out' => '2026-09-15',
                'guests' => 4,
                'total_price' => 1595,
                'status' => 'confirmed',
                'user_name' => 'Emily Davis',
                'user_email' => 'emily.d@example.com',
            ],
        ];

        $hotels = (new HotelsController)->getHotels();
        $favoriteHotels = array_slice($hotels, 0, 3);

        return view('dashboard.index', [
            'bookings' => $bookings,
            'favoriteHotels' => $favoriteHotels,
        ]);
    }
}
