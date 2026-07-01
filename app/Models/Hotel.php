<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'city',
        'address',
        'phone',
        'email',
        'rating',
        'price',
        'featured',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'featured'  => 'boolean',
            'is_active' => 'boolean',
            'rating'    => 'integer',
            'price'     => 'decimal:2',
        ];
    }

    /**
     * Get the rooms for this hotel.
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Get the images for this hotel.
     */
    public function images(): HasMany
    {
        return $this->hasMany(HotelImage::class);
    }

    /**
     * Get the reviews for this hotel.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the bookings for this hotel (through rooms).
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * The amenities that belong to the hotel.
     */
    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'hotel_amenity');
    }

    /**
     * Get the average rating from reviews.
     */
    public function getAverageRatingAttribute(): float
    {
        $avg = $this->reviews()->avg('rating');
        return $avg ? round($avg, 1) : 0;
    }

    /**
     * Get all image URLs including the primary and gallery images.
     */
    public function getAllImagesAttribute(): array
    {
        $gallery = $this->images->pluck('image_path')->toArray();
        if ($this->image && !in_array($this->image, $gallery)) {
            array_unshift($gallery, $this->image);
        }
        return $gallery ?: [$this->image];
    }
}
