<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination',
        'price',
        'duration_days',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
