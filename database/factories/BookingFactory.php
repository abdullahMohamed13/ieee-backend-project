<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        $checkIn  = Carbon::instance(fake()->dateTimeBetween('-3 months', '+3 months'));
        $nights   = fake()->numberBetween(1, 7);
        $checkOut = $checkIn->copy()->addDays($nights);
        $price    = fake()->randomFloat(2, 89, 599);
        $subtotal = round($price * $nights, 2);
        $taxes    = round($subtotal * 0.15, 2);

        return [
            'user_id'          => User::factory(),
            'hotel_id'         => Hotel::factory(),
            'room_id'          => null,
            'first_name'       => fake()->firstName(),
            'last_name'        => fake()->lastName(),
            'email'            => fake()->safeEmail(),
            'phone'            => fake()->phoneNumber(),
            'address'          => fake()->address(),
            'check_in'         => $checkIn->toDateString(),
            'check_out'        => $checkOut->toDateString(),
            'guests'           => fake()->numberBetween(1, 4),
            'room_type'        => fake()->randomElement(['Standard Room', 'Deluxe King', 'Executive Suite', 'Presidential Suite']),
            'special_requests' => fake()->optional()->sentence(),
            'nights'           => $nights,
            'subtotal'         => $subtotal,
            'taxes'            => $taxes,
            'total_price'      => round($subtotal + $taxes, 2),
            'status'           => fake()->randomElement(['confirmed', 'confirmed', 'pending', 'cancelled', 'completed']),
            'payment_status'   => fake()->randomElement(['unpaid', 'paid', 'paid', 'paid']),
        ];
    }

    public function confirmed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status'         => 'confirmed',
            'payment_status' => 'paid',
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status'         => 'pending',
            'payment_status' => 'unpaid',
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status'         => 'cancelled',
            'payment_status' => 'refunded',
        ]);
    }
}
