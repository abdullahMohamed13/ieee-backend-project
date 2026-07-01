<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $amenities = [
            ['name' => 'WiFi',           'icon' => 'wifi',       'category' => 'connectivity'],
            ['name' => 'Pool',           'icon' => 'waves',      'category' => 'recreation'],
            ['name' => 'Spa',            'icon' => 'sparkles',   'category' => 'wellness'],
            ['name' => 'Gym',            'icon' => 'dumbbell',   'category' => 'fitness'],
            ['name' => 'Restaurant',     'icon' => 'utensils',   'category' => 'dining'],
            ['name' => 'Bar',            'icon' => 'glass',      'category' => 'dining'],
            ['name' => 'Room Service',   'icon' => 'bell',       'category' => 'service'],
            ['name' => 'Parking',        'icon' => 'car',        'category' => 'convenience'],
            ['name' => 'Beach Access',   'icon' => 'umbrella',   'category' => 'location'],
            ['name' => 'Water Sports',   'icon' => 'anchor',     'category' => 'recreation'],
            ['name' => 'Ski Storage',    'icon' => 'mountain',   'category' => 'recreation'],
            ['name' => 'Fireplace',      'icon' => 'flame',      'category' => 'comfort'],
            ['name' => 'Business Center','icon' => 'briefcase', 'category' => 'business'],
            ['name' => 'Golf Course',    'icon' => 'flag',       'category' => 'recreation'],
            ['name' => 'Tennis Court',   'icon' => 'circle',     'category' => 'recreation'],
            ['name' => 'Courtyard',      'icon' => 'tree',       'category' => 'outdoor'],
            ['name' => 'Bike Rentals',   'icon' => 'bicycle',    'category' => 'recreation'],
            ['name' => 'Rooftop Bar',    'icon' => 'building',   'category' => 'dining'],
            ['name' => 'Concierge',      'icon' => 'user',       'category' => 'service'],
            ['name' => 'Art Gallery',    'icon' => 'image',      'category' => 'culture'],
        ];

        foreach ($amenities as $amenity) {
            Amenity::create($amenity);
        }
    }
}
