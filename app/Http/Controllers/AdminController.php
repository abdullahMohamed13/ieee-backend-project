<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = $this->getBookings();

        $revenueData = [
            ['month' => 'Jan', 'revenue' => 45000],
            ['month' => 'Feb', 'revenue' => 52000],
            ['month' => 'Mar', 'revenue' => 48000],
            ['month' => 'Apr', 'revenue' => 61000],
            ['month' => 'May', 'revenue' => 55000],
            ['month' => 'Jun', 'revenue' => 67000],
        ];

        $bookingTrends = [
            ['month' => 'Jan', 'bookings' => 142],
            ['month' => 'Feb', 'bookings' => 165],
            ['month' => 'Mar', 'bookings' => 138],
            ['month' => 'Apr', 'bookings' => 189],
            ['month' => 'May', 'bookings' => 176],
            ['month' => 'Jun', 'bookings' => 208],
        ];

        return view('admin.dashboard', [
            'bookings' => $bookings,
            'revenueData' => $revenueData,
            'bookingTrends' => $bookingTrends,
            'stats' => [
                'totalHotels' => 156,
                'totalRooms' => 1248,
                'totalBookings' => 3842,
                'revenue' => '$428K',
                'occupancyRate' => '87.5%',
                'avgBookingValue' => '$847',
                'activeCustomers' => '2,847',
            ],
        ]);
    }

    public function hotels()
    {
        $hotels = (new HotelsController)->getHotels();
        return view('admin.hotels', ['hotels' => $hotels]);
    }

    public function rooms()
    {
        $hotels = (new HotelsController)->getHotels();
        $rooms = $this->getRooms();
        return view('admin.rooms', ['rooms' => $rooms, 'hotels' => $hotels]);
    }

    public function bookings(Request $request)
    {
        $bookings = $this->getBookings();

        $stats = [
            'total' => count($bookings),
            'confirmed' => count(array_filter($bookings, fn($b) => $b['status'] === 'confirmed')),
            'pending' => count(array_filter($bookings, fn($b) => $b['status'] === 'pending')),
            'cancelled' => count(array_filter($bookings, fn($b) => $b['status'] === 'cancelled')),
        ];

        return view('admin.bookings', [
            'bookings' => $bookings,
            'stats' => $stats,
        ]);
    }

    private function getBookings(): array
    {
        return [
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
    }

    private function getRooms(): array
    {
        return [
            ['id' => 'r1', 'hotel_id' => 1, 'type' => 'Deluxe King', 'capacity' => 2, 'price' => 299, 'available' => true, 'amenities' => ['King Bed', 'City View', 'Work Desk']],
            ['id' => 'r2', 'hotel_id' => 1, 'type' => 'Executive Suite', 'capacity' => 3, 'price' => 449, 'available' => true, 'amenities' => ['King Bed', 'Living Room', 'Balcony']],
            ['id' => 'r3', 'hotel_id' => 1, 'type' => 'Presidential Suite', 'capacity' => 4, 'price' => 799, 'available' => true, 'amenities' => ['Master Bedroom', 'Dining Room', 'Panoramic View']],
            ['id' => 'r4', 'hotel_id' => 2, 'type' => 'Ocean View Room', 'capacity' => 2, 'price' => 349, 'available' => true, 'amenities' => ['Queen Bed', 'Ocean View', 'Balcony']],
            ['id' => 'r5', 'hotel_id' => 2, 'type' => 'Beach Villa', 'capacity' => 4, 'price' => 599, 'available' => false, 'amenities' => ['2 Bedrooms', 'Private Beach Access', 'Terrace']],
            ['id' => 'r6', 'hotel_id' => 3, 'type' => 'Mountain View Room', 'capacity' => 2, 'price' => 189, 'available' => true, 'amenities' => ['King Bed', 'Mountain View', 'Fireplace']],
            ['id' => 'r7', 'hotel_id' => 4, 'type' => 'Standard Room', 'capacity' => 2, 'price' => 179, 'available' => true, 'amenities' => ['Queen Bed', 'Work Desk']],
            ['id' => 'r8', 'hotel_id' => 4, 'type' => 'Business Suite', 'capacity' => 2, 'price' => 279, 'available' => false, 'amenities' => ['King Bed', 'Living Room', 'Work Desk']],
            ['id' => 'r9', 'hotel_id' => 5, 'type' => 'Desert View Suite', 'capacity' => 2, 'price' => 349, 'available' => true, 'amenities' => ['King Bed', 'Desert View', 'Balcony']],
            ['id' => 'r10', 'hotel_id' => 5, 'type' => 'Premium Villa', 'capacity' => 6, 'price' => 799, 'available' => true, 'amenities' => ['3 Bedrooms', 'Private Pool', 'Terrace']],
            ['id' => 'r11', 'hotel_id' => 6, 'type' => 'Classic Room', 'capacity' => 2, 'price' => 199, 'available' => true, 'amenities' => ['Queen Bed', 'Courtyard View']],
            ['id' => 'r12', 'hotel_id' => 7, 'type' => 'Ocean Front Suite', 'capacity' => 2, 'price' => 449, 'available' => true, 'amenities' => ['King Bed', 'Ocean Front', 'Living Room']],
            ['id' => 'r13', 'hotel_id' => 7, 'type' => 'Penthouse', 'capacity' => 4, 'price' => 999, 'available' => false, 'amenities' => ['2 Bedrooms', 'Rooftop Terrace', 'Wet Bar']],
            ['id' => 'r14', 'hotel_id' => 8, 'type' => 'City View Room', 'capacity' => 2, 'price' => 229, 'available' => true, 'amenities' => ['Queen Bed', 'City View']],
            ['id' => 'r15', 'hotel_id' => 8, 'type' => 'Loft Suite', 'capacity' => 3, 'price' => 349, 'available' => true, 'amenities' => ['King Bed', 'Living Room', 'Kitchenette']],
        ];
    }
}
