<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Get some users and hotels
        $users  = User::where('role', 'user')->limit(10)->get();
        $hotels = Hotel::with('rooms')->limit(10)->get();

        // Create predefined bookings matching UI data
        $predefinedBookings = [
            [
                'user_id' => $users->where('email', 'john.smith@example.com')->first()?->id ?? $users->first()->id,
                'hotel_id' => 1,
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'check_in' => '2026-07-15',
                'check_out' => '2026-07-18',
                'guests' => 2,
                'room_type' => 'Deluxe King',
                'status' => 'confirmed',
            ],
            [
                'user_id' => $users->skip(1)->first()?->id ?? $users->first()->id,
                'hotel_id' => 2,
                'first_name' => 'Sarah',
                'last_name' => 'Johnson',
                'email' => 'sarah.j@example.com',
                'check_in' => '2026-08-01',
                'check_out' => '2026-08-05',
                'guests' => 2,
                'room_type' => 'Ocean View Room',
                'status' => 'pending',
            ],
            [
                'user_id' => $users->skip(2)->first()?->id ?? $users->first()->id,
                'hotel_id' => 3,
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'm.brown@example.com',
                'check_in' => '2026-07-20',
                'check_out' => '2026-07-23',
                'guests' => 3,
                'room_type' => 'Mountain View Room',
                'status' => 'confirmed',
            ],
            [
                'user_id' => $users->skip(3)->first()?->id ?? $users->first()->id,
                'hotel_id' => 7,
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.d@example.com',
                'check_in' => '2026-09-10',
                'check_out' => '2026-09-15',
                'guests' => 4,
                'room_type' => 'Beach Suite',
                'status' => 'confirmed',
            ],
        ];

        foreach ($predefinedBookings as $bookingData) {
            $hotel = Hotel::find($bookingData['hotel_id']);
            if (!$hotel) continue;

            $nights = \Carbon\Carbon::parse($bookingData['check_in'])
                ->diffInDays(\Carbon\Carbon::parse($bookingData['check_out']));

            $price = $hotel->price;
            $subtotal = round($price * $nights, 2);
            $taxes = round($subtotal * 0.15, 2);

            Booking::create(array_merge($bookingData, [
                'phone' => fake()->phoneNumber(),
                'nights' => $nights,
                'subtotal' => $subtotal,
                'taxes' => $taxes,
                'total_price' => round($subtotal + $taxes, 2),
                'payment_status' => $bookingData['status'] === 'confirmed' ? 'paid' : 'unpaid',
            ]));
        }

        // Create additional random bookings
        foreach ($users as $user) {
            Booking::factory(rand(1, 3))->create([
                'user_id' => $user->id,
                'hotel_id' => $hotels->random()->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
            ]);
        }
    }
}
