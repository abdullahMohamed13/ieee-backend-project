<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured hotels
        $hotels = Hotel::with(['amenities', 'images'])
            ->where('is_active', true)
            ->where('featured', true)
            ->limit(6)
            ->get()
            ->map(function ($hotel) {
                return [
                    'id'        => $hotel->id,
                    'name'      => $hotel->name,
                    'location'  => $hotel->location,
                    'city'      => $hotel->city,
                    'rating'    => $hotel->rating,
                    'price'     => $hotel->price,
                    'featured'  => $hotel->featured,
                    'image'     => $hotel->image,
                    'amenities' => $hotel->amenities->pluck('name')->toArray(),
                ];
            });

        // Popular destinations
        $popularDestinations = [
            [
                'id'     => 'd1',
                'name'   => 'New York',
                'hotels' => Hotel::where('city', 'New York')->where('is_active', true)->count(),
                'image'  => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800',
            ],
            [
                'id'     => 'd2',
                'name'   => 'Miami',
                'hotels' => Hotel::where('city', 'Miami')->where('is_active', true)->count(),
                'image'  => 'https://images.unsplash.com/photo-1506966953602-c20cc11f75e3?w=800',
            ],
            [
                'id'     => 'd3',
                'name'   => 'Los Angeles',
                'hotels' => Hotel::where('city', 'Los Angeles')->where('is_active', true)->count(),
                'image'  => 'https://images.unsplash.com/photo-1506812574058-fc75fa93fead?w=800',
            ],
            [
                'id'     => 'd4',
                'name'   => 'Chicago',
                'hotels' => Hotel::where('city', 'Chicago')->where('is_active', true)->count(),
                'image'  => 'https://images.unsplash.com/photo-1494522855154-9297ac14b55f?w=800',
            ],
        ];

        // Testimonials (static for now)
        $testimonials = [
            [
                'id'       => 't1',
                'name'     => 'Jennifer Martinez',
                'location' => 'Los Angeles, CA',
                'rating'   => 5,
                'text'     => 'Absolutely amazing experience! The hotel exceeded all expectations. Beautiful rooms, excellent service, and the location was perfect. Will definitely book again!',
                'avatar'   => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150',
            ],
            [
                'id'       => 't2',
                'name'     => 'Robert Chen',
                'location' => 'San Francisco, CA',
                'rating'   => 5,
                'text'     => "Best hotel booking platform I've used. Easy to navigate, great selection of hotels, and the booking process was seamless. Highly recommend!",
                'avatar'   => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150',
            ],
            [
                'id'       => 't3',
                'name'     => 'Amanda Wilson',
                'location' => 'Boston, MA',
                'rating'   => 5,
                'text'     => 'The attention to detail and customer service was outstanding. From booking to checkout, everything was perfect. The spa was incredible!',
                'avatar'   => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150',
            ],
        ];

        return view('pages.home', compact('hotels', 'popularDestinations', 'testimonials'));
    }
}
