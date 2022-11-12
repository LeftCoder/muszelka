<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
