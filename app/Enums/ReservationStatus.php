<?php

namespace App\Enums;

enum ReservationStatus: int
{
    case ACCEPTED = 1;
    case CONFIRMED = 2;
    case CANCELED = 3;
    case DONE = 4;

    public function label(): string
    {
        return match ($this) {
            self::ACCEPTED => 'Przyjęta',
            self::CONFIRMED => 'Potwierdzona',
            self::CANCELED => 'Anulowana',
            self::DONE => 'Zakończona',
            default => 'Nieznany status rezerwacji',
        };
    }
}
