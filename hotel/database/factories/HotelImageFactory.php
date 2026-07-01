<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelImageFactory extends Factory
{
    private static array $unsplashImages = [
        'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800',
        'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800',
        'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800',
        'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800',
        'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800',
        'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
        'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800',
    ];

    public function definition(): array
    {
        return [
            'hotel_id'   => Hotel::factory(),
            'image_path' => fake()->randomElement(self::$unsplashImages),
            'sort_order' => 0,
        ];
    }
}
