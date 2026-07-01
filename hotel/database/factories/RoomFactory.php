<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    private static array $roomTypes = [
        'Standard Room',
        'Deluxe Room',
        'Deluxe King',
        'Executive Suite',
        'Presidential Suite',
        'Ocean View Room',
        'Mountain View Room',
        'Beach Villa',
        'Family Suite',
        'Studio Room',
    ];

    public function definition(): array
    {
        return [
            'hotel_id'     => Hotel::factory(),
            'type'         => fake()->randomElement(self::$roomTypes),
            'description'  => fake()->paragraph(),
            'capacity'     => fake()->numberBetween(1, 6),
            'price'        => fake()->randomFloat(2, 79, 799),
            'is_available' => fake()->boolean(80),
            'amenities'    => fake()->randomElements(
                ['King Bed', 'Queen Bed', 'City View', 'Ocean View', 'Balcony', 'Living Room', 'Work Desk', 'Bathtub', 'Kitchenette'],
                fake()->numberBetween(2, 5)
            ),
        ];
    }
}
