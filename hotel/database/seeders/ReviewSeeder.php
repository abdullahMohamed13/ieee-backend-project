<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->limit(10)->get();
        $hotels = Hotel::limit(10)->get();

        // Create predefined reviews matching UI data
        $predefinedReviews = [
            [
                'hotel_id' => 1,
                'rating' => 5,
                'body' => "Absolutely wonderful stay! The room was immaculate, staff were incredibly friendly, and the location couldn't be better.",
            ],
            [
                'hotel_id' => 1,
                'rating' => 5,
                'body' => 'Exceeded all expectations. The amenities were top-notch and the service was impeccable. Will definitely return!',
            ],
            [
                'hotel_id' => 1,
                'rating' => 4,
                'body' => 'Great hotel with beautiful rooms and excellent facilities. Only minor issue was the breakfast could have more variety.',
            ],
        ];

        foreach ($predefinedReviews as $index => $reviewData) {
            $user = $users->skip($index)->first() ?? $users->first();
            
            Review::create(array_merge($reviewData, [
                'user_id' => $user->id,
            ]));
        }

        // Create random reviews for other hotels
        foreach ($hotels as $hotel) {
            $numReviews = rand(2, 8);
            $usedUsers = [];

            for ($i = 0; $i < $numReviews; $i++) {
                $user = $users->whereNotIn('id', $usedUsers)->random();
                $usedUsers[] = $user->id;

                try {
                    Review::create([
                        'user_id' => $user->id,
                        'hotel_id' => $hotel->id,
                        'rating' => rand(3, 5),
                        'body' => fake()->paragraph(3),
                    ]);
                } catch (\Exception $e) {
                    // Skip if duplicate (user already reviewed this hotel)
                    continue;
                }
            }
        }
    }
}
