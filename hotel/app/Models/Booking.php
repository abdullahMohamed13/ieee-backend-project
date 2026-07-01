<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_id',
        'room_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'check_in',
        'check_out',
        'guests',
        'room_type',
        'special_requests',
        'nights',
        'subtotal',
        'taxes',
        'total_price',
        'status',
        'payment_status',
    ];

    protected function casts(): array
    {
        return [
            'check_in'       => 'date',
            'check_out'      => 'date',
            'guests'         => 'integer',
            'nights'         => 'integer',
            'subtotal'       => 'decimal:2',
            'taxes'          => 'decimal:2',
            'total_price'    => 'decimal:2',
        ];
    }

    /**
     * Get the user that owns the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the hotel for the booking.
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the room for the booking.
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the review for this booking.
     */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    /**
     * Calculate the number of nights.
     */
    public static function calculateNights(string $checkIn, string $checkOut): int
    {
        return (int) Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut));
    }

    /**
     * Calculate the total price breakdown.
     */
    public static function calculatePrice(float $pricePerNight, int $nights): array
    {
        $subtotal = $pricePerNight * $nights;
        $taxes    = round($subtotal * 0.15, 2);
        $total    = round($subtotal + $taxes, 2);

        return [
            'subtotal' => $subtotal,
            'taxes'    => $taxes,
            'total'    => $total,
        ];
    }

    /**
     * Get the guest full name.
     */
    public function getGuestNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Status badge color class.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'confirmed' => 'bg-green-100 text-green-800',
            'pending'   => 'bg-yellow-100 text-yellow-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default     => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Status icon name.
     */
    public function getStatusIconAttribute(): string
    {
        return match ($this->status) {
            'confirmed' => 'check-circle',
            'pending'   => 'clock',
            'cancelled' => 'x-circle',
            default     => 'info',
        };
    }
}
