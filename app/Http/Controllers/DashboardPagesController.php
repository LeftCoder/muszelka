<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\FeatureResource;
use App\Http\Resources\ReservationResource;
use App\Models\Apartment;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Reservation;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class DashboardPagesController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard/Index');
    }

    public function reservations()
    {
        $filters = Request::only(['search', 'status']);
        $reservations = ReservationResource::collection(
            Reservation::query()
                ->with('apartment')
                ->orderBy('start', 'desc')
                ->filter($filters)
                ->paginate(10)
                ->withQueryString()
        );

        return Inertia::render('Dashboard/ReservationsList', [
            'reservations' => $reservations,
            'filters' => $filters,
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

    public function features()
    {
        return Inertia::render('Dashboard/FeaturesList', [
            'features' => FeatureResource::collection(Feature::all()),
        ]);
    }

    public function faqs()
    {
        $faqs = FaqResource::collection(
            Faq::query()->paginate(10)
        );

        return Inertia::render('Dashboard/FaqList', [
            'faqs' => $faqs,
        ]);
    }
}
