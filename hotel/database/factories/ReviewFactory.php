<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'hotel_id'   => Hotel::factory(),
            'booking_id' => null,
            'rating'     => fake()->numberBetween(3, 5),
            'title'      => fake()->sentence(6),
            'body'       => fake()->paragraph(3),
        ];
    }
}
