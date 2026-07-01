<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::with(['amenities', 'images'])
            ->where('is_active', true);

        // Filter by destination/city
        if ($request->has('destination') && $request->destination) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->destination . '%')
                  ->orWhere('location', 'like', '%' . $request->destination . '%')
                  ->orWhere('name', 'like', '%' . $request->destination . '%');
            });
        }

        // Filter by price
        if ($request->has('budget') && $request->budget) {
            $query->where('price', '<=', $request->budget);
        }

        // Filter by rating
        if ($request->has('rating') && is_array($request->rating)) {
            $query->whereIn('rating', $request->rating);
        }

        // Get all hotels
        $allHotels = $query->get()->map(function ($hotel) {
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

        // Pagination
        $itemsPerPage  = 6;
        $currentPage   = max(1, (int) $request->get('page', 1));
        $totalPages    = (int) ceil($allHotels->count() / $itemsPerPage);
        $currentPage   = min($currentPage, max(1, $totalPages));
        $currentHotels = $allHotels->slice(($currentPage - 1) * $itemsPerPage, $itemsPerPage)->values();

        return view('pages.hotels', compact('allHotels', 'currentHotels', 'currentPage', 'totalPages', 'itemsPerPage'));
    }

    public function show($id)
    {
        $hotel = Hotel::with(['amenities', 'images', 'rooms', 'reviews.user'])
            ->where('is_active', true)
            ->findOrFail($id);

        // Transform hotel data
        $hotelData = [
            'id'          => $hotel->id,
            'name'        => $hotel->name,
            'description' => $hotel->description,
            'location'    => $hotel->location,
            'city'        => $hotel->city,
            'rating'      => $hotel->rating,
            'price'       => $hotel->price,
            'featured'    => $hotel->featured,
            'image'       => $hotel->image,
            'images'      => $hotel->all_images,
            'amenities'   => $hotel->amenities->pluck('name')->toArray(),
        ];

        // Transform rooms data
        $hotelRooms = $hotel->rooms->map(function ($room) {
            return [
                'id'        => $room->id,
                'hotelId'   => $room->hotel_id,
                'type'      => $room->type,
                'capacity'  => $room->capacity,
                'price'     => $room->price,
                'available' => $room->is_available,
                'amenities' => $room->amenities ?? [],
            ];
        })->toArray();

        // Transform reviews
        $reviews = $hotel->reviews->take(10)->map(function ($review) {
            return [
                'id'     => $review->id,
                'name'   => $review->user->name ?? 'Anonymous',
                'rating' => $review->rating,
                'date'   => $review->created_at->format('F d, Y'),
                'text'   => $review->body,
                'avatar' => $review->user->avatar ?? 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100',
            ];
        })->toArray();

        return view('pages.hotel-details', compact('hotelData', 'hotelRooms', 'reviews'))->with('hotel', $hotelData);
    }
}
