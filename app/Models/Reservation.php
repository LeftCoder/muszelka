<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'status' => ReservationStatus::class,
    ];

    public function token()
    {
        return $this->hasOne(ResrvationToken::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function daysOfStay()
    {
        return $this->start->diffInDays($this->end) === 0
            ? $this->start->diffInDays($this->end) + 1
            : $this->start->diffInDays($this->end);
    }
}
