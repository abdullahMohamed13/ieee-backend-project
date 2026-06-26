<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function getHotels(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Grand Luxury Hotel',
                'location' => 'New York, USA',
                'city' => 'New York',
                'rating' => 5,
                'price' => 299,
                'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                ],
                'description' => 'Experience unparalleled luxury in the heart of Manhattan. Our five-star hotel offers breathtaking views of the city skyline, world-class dining, and exceptional service that will make your stay unforgettable.',
                'amenities' => ['WiFi', 'Pool', 'Gym', 'Restaurant', 'Spa', 'Parking'],
                'featured' => true,
            ],
            [
                'id' => 2,
                'name' => 'Seaside Resort & Spa',
                'location' => 'Malibu, USA',
                'city' => 'Malibu',
                'rating' => 5,
                'price' => 399,
                'image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                ],
                'description' => 'Escape to our beachfront paradise in Malibu. With direct beach access, a world-class spa, and ocean-view suites, every moment at Seaside Resort is designed for relaxation and rejuvenation.',
                'amenities' => ['WiFi', 'Pool', 'Spa', 'Restaurant', 'Parking'],
                'featured' => true,
            ],
            [
                'id' => 3,
                'name' => 'Mountain View Lodge',
                'location' => 'Aspen, USA',
                'city' => 'Aspen',
                'rating' => 4,
                'price' => 249,
                'image' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                ],
                'description' => 'Nestled in the heart of the Rocky Mountains, Mountain View Lodge offers stunning alpine views, premium ski access, and cozy luxury accommodations for an unforgettable mountain getaway.',
                'amenities' => ['WiFi', 'Restaurant', 'Parking', 'Spa'],
                'featured' => false,
            ],
            [
                'id' => 4,
                'name' => 'City Center Hotel',
                'location' => 'Chicago, USA',
                'city' => 'Chicago',
                'rating' => 4,
                'price' => 179,
                'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                ],
                'description' => 'Stay in the heart of downtown Chicago. Our modern hotel puts you steps away from world-class shopping, dining, and entertainment venues.',
                'amenities' => ['WiFi', 'Gym', 'Restaurant', 'Parking'],
                'featured' => false,
            ],
            [
                'id' => 5,
                'name' => 'Desert Oasis Resort',
                'location' => 'Scottsdale, USA',
                'city' => 'Scottsdale',
                'rating' => 5,
                'price' => 349,
                'image' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=800',
                ],
                'description' => 'A luxurious desert retreat featuring stunning architecture, championship golf courses, and unparalleled service amidst the beautiful Sonoran Desert landscape.',
                'amenities' => ['WiFi', 'Pool', 'Spa', 'Restaurant', 'Gym', 'Parking'],
                'featured' => true,
            ],
            [
                'id' => 6,
                'name' => 'Historic Downtown Inn',
                'location' => 'Boston, USA',
                'city' => 'Boston',
                'rating' => 4,
                'price' => 199,
                'image' => 'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800',
                ],
                'description' => 'Experience the charm of historic Boston from our beautifully restored inn. Walking distance to Freedom Trail, Harvard, and the finest New England cuisine.',
                'amenities' => ['WiFi', 'Restaurant', 'Parking'],
                'featured' => false,
            ],
            [
                'id' => 7,
                'name' => 'Coastal Paradise Hotel',
                'location' => 'Miami, USA',
                'city' => 'Miami',
                'rating' => 5,
                'price' => 449,
                'image' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                ],
                'description' => 'Beachfront luxury in the heart of South Beach. Enjoy stunning ocean views, vibrant nightlife, and world-class dining at our premier Miami destination.',
                'amenities' => ['WiFi', 'Pool', 'Gym', 'Restaurant', 'Spa', 'Parking'],
                'featured' => true,
            ],
            [
                'id' => 8,
                'name' => 'Urban Boutique Hotel',
                'location' => 'San Francisco, USA',
                'city' => 'San Francisco',
                'rating' => 4,
                'price' => 229,
                'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=600',
                'images' => [
                    'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                ],
                'description' => 'A chic boutique hotel in the heart of San Francisco. Experience unique design, personalized service, and easy access to the Golden Gate Bridge and Fisherman\'s Wharf.',
                'amenities' => ['WiFi', 'Gym', 'Restaurant'],
                'featured' => false,
            ],
        ];
    }

    private function getRooms(): array
    {
        return [
            ['id' => 1, 'hotel_id' => 1, 'type' => 'Deluxe King', 'capacity' => 2, 'price' => 299, 'available' => true],
            ['id' => 2, 'hotel_id' => 1, 'type' => 'Executive Suite', 'capacity' => 3, 'price' => 499, 'available' => true],
            ['id' => 3, 'hotel_id' => 1, 'type' => 'Presidential Suite', 'capacity' => 4, 'price' => 899, 'available' => false],
            ['id' => 4, 'hotel_id' => 2, 'type' => 'Ocean View King', 'capacity' => 2, 'price' => 399, 'available' => true],
            ['id' => 5, 'hotel_id' => 2, 'type' => 'Beachfront Suite', 'capacity' => 3, 'price' => 599, 'available' => true],
            ['id' => 6, 'hotel_id' => 3, 'type' => 'Mountain View Room', 'capacity' => 2, 'price' => 249, 'available' => true],
            ['id' => 7, 'hotel_id' => 3, 'type' => 'Ski Suite', 'capacity' => 4, 'price' => 449, 'available' => true],
            ['id' => 8, 'hotel_id' => 4, 'type' => 'Standard Room', 'capacity' => 2, 'price' => 179, 'available' => true],
            ['id' => 9, 'hotel_id' => 4, 'type' => 'Business Suite', 'capacity' => 2, 'price' => 279, 'available' => false],
            ['id' => 10, 'hotel_id' => 5, 'type' => 'Desert View Suite', 'capacity' => 2, 'price' => 349, 'available' => true],
            ['id' => 11, 'hotel_id' => 5, 'type' => 'Premium Villa', 'capacity' => 6, 'price' => 799, 'available' => true],
            ['id' => 12, 'hotel_id' => 6, 'type' => 'Classic Room', 'capacity' => 2, 'price' => 199, 'available' => true],
            ['id' => 13, 'hotel_id' => 7, 'type' => 'Ocean Front Suite', 'capacity' => 2, 'price' => 449, 'available' => true],
            ['id' => 14, 'hotel_id' => 7, 'type' => 'Penthouse', 'capacity' => 4, 'price' => 999, 'available' => false],
            ['id' => 15, 'hotel_id' => 8, 'type' => 'City View Room', 'capacity' => 2, 'price' => 229, 'available' => true],
            ['id' => 16, 'hotel_id' => 8, 'type' => 'Loft Suite', 'capacity' => 3, 'price' => 349, 'available' => true],
        ];
    }

    private function getReviews(): array
    {
        return [
            ['id' => 1, 'name' => 'Sarah Johnson', 'rating' => 5, 'date' => 'June 15, 2026', 'text' => 'Absolutely wonderful stay! The staff went above and beyond to make our anniversary special. The room was stunning with breathtaking views.', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100'],
            ['id' => 2, 'name' => 'Michael Brown', 'rating' => 5, 'date' => 'June 10, 2026', 'text' => 'Exceeded all expectations. From the moment we arrived, everything was perfect. The amenities are top-notch and the location is unbeatable.', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100'],
            ['id' => 3, 'name' => 'Emily Davis', 'rating' => 4, 'date' => 'June 5, 2026', 'text' => 'Great hotel with beautiful rooms and excellent service. The restaurant had amazing food. Would definitely recommend to friends and family.', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100'],
        ];
    }

    public function index()
    {
        $hotels = $this->getHotels();
        return view('hotels.index', ['hotels' => $hotels]);
    }

    public function show(string $id)
    {
        $hotels = $this->getHotels();
        $hotel = collect($hotels)->firstWhere('id', (int) $id);

        if (!$hotel) {
            abort(404);
        }

        $rooms = collect($this->getRooms())->where('hotel_id', (int) $id)->values()->all();
        $reviews = $this->getReviews();

        return view('hotels.show', [
            'hotel' => $hotel,
            'rooms' => $rooms,
            'reviews' => $reviews,
        ]);
    }
}
