<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    private static array $unsplashImages = [
        'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
        'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
        'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
        'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800',
        'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800',
        'https://images.unsplash.com/photo-1587985064135-0366536eab42?w=800',
        'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=800',
        'https://images.unsplash.com/photo-1517840901100-8179e982acb7?w=800',
    ];

    public function definition(): array
    {
        $cities = ['New York', 'Miami', 'Chicago', 'Los Angeles', 'Aspen', 'New Orleans', 'Scottsdale', 'Las Vegas'];
        $city   = fake()->randomElement($cities);

        return [
            'name'        => fake()->company() . ' Hotel',
            'description' => fake()->paragraphs(2, true),
            'location'    => fake()->streetAddress() . ', ' . $city,
            'city'        => $city,
            'address'     => fake()->streetAddress(),
            'phone'       => fake()->phoneNumber(),
            'email'       => fake()->companyEmail(),
            'rating'      => fake()->numberBetween(3, 5),
            'price'       => fake()->randomFloat(2, 89, 599),
            'featured'    => fake()->boolean(30),
            'image'       => fake()->randomElement(self::$unsplashImages),
            'is_active'   => true,
        ];
    }
}
