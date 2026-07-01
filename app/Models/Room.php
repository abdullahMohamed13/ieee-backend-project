<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'type',
        'description',
        'capacity',
        'price',
        'is_available',
        'image',
        'amenities',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'capacity'     => 'integer',
            'price'        => 'decimal:2',
            'amenities'    => 'array',
        ];
    }

    /**
     * Get the hotel that owns this room.
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the bookings for this room.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Check if the room is available for the given dates.
     */
    public function isAvailableForDates(string $checkIn, string $checkOut): bool
    {
        if (!$this->is_available) {
            return false;
        }

        return !$this->bookings()
            ->whereIn('status', ['confirmed', 'pending'])
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
            })
            ->exists();
    }
}
