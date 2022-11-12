<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Http\Resources\ReservationResource;
use App\Models\Apartment;
use App\Models\Reservation;
use Inertia\Inertia;

class DashboardPagesController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard/Index');
    }

    public function reservations()
    {
        $reservations = ReservationResource::collection(
            Reservation::query()
                ->with('apartment')
                ->orderBy('start', 'desc')
                ->paginate(10)
        );

        return Inertia::render('Dashboard/ReservationsList', [
            'reservations' => $reservations,
        ]);
    }

    public function apartments()
    {
        $apartments = ApartmentResource::collection(
            Apartment::query()
                ->withLastReservation()
                ->get()
        );

        return Inertia::render('Dashboard/ApartmentsList', [
            'apartments' => $apartments,
        ]);
    }
}
