<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        // Predefined hotels matching the UI mock data
        $hotels = [
            [
                'name'        => 'Grand Luxury Hotel',
                'description' => 'Experience ultimate luxury at the Grand Luxury Hotel, featuring world-class amenities, stunning views, and impeccable service. Located in the heart of downtown New York, our hotel offers the perfect blend of elegance and comfort.',
                'location'    => 'Downtown, New York',
                'city'        => 'New York',
                'address'     => '123 Luxury Avenue',
                'phone'       => '+1 (555) 001-0001',
                'email'       => 'info@grandluxury.com',
                'rating'      => 5,
                'price'       => 299.00,
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Pool', 'Spa', 'Gym', 'Restaurant', 'Bar', 'Room Service', 'Parking'],
                'images'      => [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800',
                    'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800',
                    'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=800',
                ],
                'rooms' => [
                    ['type' => 'Deluxe King', 'capacity' => 2, 'price' => 299, 'amenities' => ['King Bed', 'City View', 'Work Desk']],
                    ['type' => 'Executive Suite', 'capacity' => 3, 'price' => 449, 'amenities' => ['King Bed', 'Living Room', 'Balcony']],
                    ['type' => 'Presidential Suite', 'capacity' => 4, 'price' => 799, 'amenities' => ['Master Bedroom', 'Dining Room', 'Panoramic View']],
                ],
            ],
            [
                'name'        => 'Seaside Resort & Spa',
                'description' => 'Escape to paradise at our beachfront resort. Enjoy pristine beaches, world-class spa treatments, and breathtaking ocean views from every room.',
                'location'    => 'Beachfront, Miami',
                'city'        => 'Miami',
                'address'     => '456 Ocean Drive',
                'phone'       => '+1 (555) 002-0002',
                'email'       => 'info@seasideresort.com',
                'rating'      => 5,
                'price'       => 349.00,
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Beach Access', 'Spa', 'Pool', 'Restaurant', 'Bar', 'Water Sports'],
                'images'      => [
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800',
                ],
                'rooms' => [
                    ['type' => 'Ocean View Room', 'capacity' => 2, 'price' => 349, 'amenities' => ['Queen Bed', 'Ocean View', 'Balcony']],
                    ['type' => 'Beach Villa', 'capacity' => 4, 'price' => 599, 'amenities' => ['2 Bedrooms', 'Private Beach Access', 'Terrace']],
                ],
            ],
            [
                'name'        => 'Mountain View Lodge',
                'description' => 'Nestled in the Rocky Mountains, our lodge offers a perfect retreat for nature lovers and adventure seekers. Enjoy skiing, hiking, and stunning mountain views.',
                'location'    => 'Aspen, Colorado',
                'city'        => 'Aspen',
                'address'     => '789 Mountain Road',
                'phone'       => '+1 (555) 003-0003',
                'email'       => 'info@mountainviewlodge.com',
                'rating'      => 4,
                'price'       => 189.00,
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Ski Storage', 'Fireplace', 'Restaurant', 'Parking', 'Gym'],
                'images'      => [
                    'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                ],
                'rooms' => [
                    ['type' => 'Mountain View Room', 'capacity' => 2, 'price' => 189, 'amenities' => ['King Bed', 'Mountain View', 'Fireplace']],
                ],
            ],
            [
                'name'        => 'City Center Hotel',
                'description' => 'Modern elegance meets urban convenience. Perfect for business and leisure travelers seeking comfort in the heart of Chicago.',
                'location'    => 'Downtown, Chicago',
                'city'        => 'Chicago',
                'address'     => '101 Business Plaza',
                'phone'       => '+1 (555) 004-0004',
                'email'       => 'info@citycenterhotel.com',
                'rating'      => 4,
                'price'       => 159.00,
                'featured'    => false,
                'image'       => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Business Center', 'Gym', 'Restaurant', 'Parking'],
                'images'      => [
                    'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800',
                    'https://images.unsplash.com/photo-1596701062351-8c2c14d1fdd0?w=800',
                ],
                'rooms' => [
                    ['type' => 'Standard Room', 'capacity' => 2, 'price' => 159, 'amenities' => ['Queen Bed', 'Work Desk']],
                ],
            ],
            [
                'name'        => 'Desert Oasis Resort',
                'description' => 'A luxurious oasis in the desert. Experience southwestern hospitality, championship golf, and spectacular sunsets.',
                'location'    => 'Scottsdale, Arizona',
                'city'        => 'Scottsdale',
                'address'     => '202 Desert Way',
                'phone'       => '+1 (555) 005-0005',
                'email'       => 'info@desertoasis.com',
                'rating'      => 5,
                'price'       => 279.00,
                'featured'    => false,
                'image'       => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Golf Course', 'Spa', 'Pool', 'Restaurant', 'Tennis Court'],
                'images'      => ['https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800'],
                'rooms' => [
                    ['type' => 'Deluxe Room', 'capacity' => 2, 'price' => 279, 'amenities' => ['King Bed', 'Desert View']],
                ],
            ],
            [
                'name'        => 'Historic Downtown Inn',
                'description' => 'Charming historic hotel in the heart of the French Quarter. Experience the unique culture and vibrant nightlife of New Orleans.',
                'location'    => 'French Quarter, New Orleans',
                'city'        => 'New Orleans',
                'address'     => '303 Bourbon Street',
                'phone'       => '+1 (555) 006-0006',
                'email'       => 'info@historicdowntowninn.com',
                'rating'      => 4,
                'price'       => 139.00,
                'featured'    => false,
                'image'       => 'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Restaurant', 'Bar', 'Courtyard', 'Room Service'],
                'images'      => ['https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800'],
                'rooms' => [
                    ['type' => 'Standard Room', 'capacity' => 2, 'price' => 139, 'amenities' => ['Queen Bed', 'Courtyard View']],
                ],
            ],
            [
                'name'        => 'Coastal Paradise Hotel',
                'description' => 'Stunning ocean views and California sunshine await. Walk to the pier, enjoy beach activities, and relax in luxury.',
                'location'    => 'Santa Monica, California',
                'city'        => 'Los Angeles',
                'address'     => '404 Beach Boulevard',
                'phone'       => '+1 (555) 007-0007',
                'email'       => 'info@coastalparadise.com',
                'rating'      => 5,
                'price'       => 319.00,
                'featured'    => true,
                'image'       => 'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Beach Access', 'Pool', 'Spa', 'Restaurant', 'Gym', 'Bike Rentals'],
                'images'      => ['https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800'],
                'rooms' => [
                    ['type' => 'Beach Suite', 'capacity' => 4, 'price' => 319, 'amenities' => ['King Bed', 'Ocean View', 'Balcony']],
                ],
            ],
            [
                'name'        => 'Urban Boutique Hotel',
                'description' => 'Stylish boutique hotel in trendy SoHo. Perfect for fashion-forward travelers seeking unique design and personalized service.',
                'location'    => 'SoHo, New York',
                'city'        => 'New York',
                'address'     => '505 Fashion Avenue',
                'phone'       => '+1 (555) 008-0008',
                'email'       => 'info@urbanboutique.com',
                'rating'      => 4,
                'price'       => 229.00,
                'featured'    => false,
                'image'       => 'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800',
                'is_active'   => true,
                'amenities'   => ['WiFi', 'Rooftop Bar', 'Restaurant', 'Concierge', 'Art Gallery'],
                'images'      => ['https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800'],
                'rooms' => [
                    ['type' => 'Studio Room', 'capacity' => 2, 'price' => 229, 'amenities' => ['Queen Bed', 'City View']],
                ],
            ],
        ];

        foreach ($hotels as $hotelData) {
            $amenityNames = $hotelData['amenities'];
            $images       = $hotelData['images'];
            $rooms        = $hotelData['rooms'];
            
            unset($hotelData['amenities'], $hotelData['images'], $hotelData['rooms']);

            $hotel = Hotel::create($hotelData);

            // Attach amenities
            $amenityIds = Amenity::whereIn('name', $amenityNames)->pluck('id');
            $hotel->amenities()->attach($amenityIds);

            // Create hotel images
            foreach ($images as $index => $imagePath) {
                HotelImage::create([
                    'hotel_id'   => $hotel->id,
                    'image_path' => $imagePath,
                    'sort_order' => $index,
                ]);
            }

            // Create rooms
            foreach ($rooms as $roomData) {
                Room::create([
                    'hotel_id'     => $hotel->id,
                    'type'         => $roomData['type'],
                    'capacity'     => $roomData['capacity'],
                    'price'        => $roomData['price'],
                    'amenities'    => $roomData['amenities'],
                    'is_available' => true,
                ]);
            }
        }

        // Create additional random hotels
        Hotel::factory(50)->create()->each(function ($hotel) {
            // Attach random amenities
            $amenities = Amenity::inRandomOrder()->limit(rand(3, 8))->pluck('id');
            $hotel->amenities()->attach($amenities);

            // Create rooms for each hotel
            Room::factory(rand(3, 10))->create(['hotel_id' => $hotel->id]);

            // Create hotel images
            HotelImage::factory(rand(1, 5))->create(['hotel_id' => $hotel->id]);
        });
    }
}
