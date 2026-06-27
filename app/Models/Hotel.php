<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'image',
        'rating'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
