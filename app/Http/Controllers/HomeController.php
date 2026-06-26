<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = (new HotelsController)->getHotels();
        $featuredHotels = collect($hotels)->where('featured', true)->values()->all();

        $popularDestinations = [
            ['id' => 'd1', 'name' => 'New York', 'hotels' => 156, 'image' => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800'],
            ['id' => 'd2', 'name' => 'Miami', 'hotels' => 98, 'image' => 'https://images.unsplash.com/photo-1506966953602-c20cc11f75e3?w=800'],
            ['id' => 'd3', 'name' => 'Los Angeles', 'hotels' => 134, 'image' => 'https://images.unsplash.com/photo-1534190239940-9ba8944ea261?w=800'],
            ['id' => 'd4', 'name' => 'Chicago', 'hotels' => 87, 'image' => 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=800'],
        ];

        $testimonials = [
            ['id' => 't1', 'name' => 'Jennifer Martinez', 'location' => 'Los Angeles, CA', 'rating' => 5, 'text' => 'Absolutely amazing experience! The hotel exceeded all expectations. Beautiful rooms, excellent service, and the location was perfect. Will definitely book again!', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150'],
            ['id' => 't2', 'name' => 'Robert Chen', 'location' => 'San Francisco, CA', 'rating' => 5, 'text' => "Best hotel booking platform I've used. Easy to navigate, great selection of hotels, and the booking process was seamless. Highly recommend!", 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150'],
            ['id' => 't3', 'name' => 'Amanda Wilson', 'location' => 'Boston, MA', 'rating' => 5, 'text' => 'The attention to detail and customer service was outstanding. From booking to checkout, everything was perfect. The spa was incredible!', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150'],
        ];

        return view('home', [
            'featuredHotels' => $featuredHotels,
            'popularDestinations' => $popularDestinations,
            'testimonials' => $testimonials,
        ]);
    }
}
