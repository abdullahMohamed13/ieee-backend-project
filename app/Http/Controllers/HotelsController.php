<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    

    private function getReviews(): array
    {
        return [
            ['id' => 1, 'name' => 'Sarah Johnson', 'rating' => 5, 'date' => 'June 15, 2026', 'text' => 'Absolutely wonderful stay! The staff went above and beyond to make our anniversary special. The room was stunning with breathtaking views.', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100'],
            ['id' => 2, 'name' => 'Michael Brown', 'rating' => 5, 'date' => 'June 10, 2026', 'text' => 'Exceeded all expectations. From the moment we arrived, everything was perfect. The amenities are top-notch and the location is unbeatable.', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100'],
            ['id' => 3, 'name' => 'Emily Davis', 'rating' => 4, 'date' => 'June 5, 2026', 'text' => 'Great hotel with beautiful rooms and excellent service. The restaurant had amazing food. Would definitely recommend to friends and family.', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100'],
        ];
    }


    public function index()
    {
        $hotels = Hotel::paginate(6);

        return view('hotels.index', compact('hotels'));
    }   


    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $rooms = $hotel->rooms; 
        $reviews = $this->getReviews();

        return view('hotels.show', [
            'hotel' => $hotel,
            'rooms' => $rooms,
            'reviews' => $reviews,
        ]);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/hotels', 'public');
        }

        

        Hotel::create($validated);

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel created successfully.');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'address', 'description', 'rating']);

        if ($request->hasFile('image')) {
            
            if ($hotel->image && file_exists(storage_path('app/public/' . $hotel->image))) {
                @unlink(storage_path('app/public/' . $hotel->image));
            }

            $imagePath = $request->file('image')->store('uploads/hotels', 'public');
            $data['image'] = $imagePath;
        }

        $hotel->update($data);

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully!');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        if ($hotel->image && file_exists(storage_path('app/public/' . $hotel->image))) {
            @unlink(storage_path('app/public/' . $hotel->image));
        }

        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully!');
    }
}
