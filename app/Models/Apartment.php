<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $casts = [
        'occupied' => 'boolean',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function lastReservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function scopeWithLastReservation($query)
    {
        $query->addSelect(['last_reservation_id' => Reservation::select('id')
            ->whereColumn('apartment_id', 'apartments.id')
            ->latest()
            ->take(1),
        ])->with(['lastReservation']);
    }
}
