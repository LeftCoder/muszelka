<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function home()
    {
        return Inertia::render('Home/Index');
    }

    public function apartments()
    {
        $apartments = ApartmentResource::collection(
            Apartment::with(['features', 'images'])->get()
        );

        return Inertia::render('Apartments/Index', ['apartments' => $apartments]);
    }

    public function faq()
    {
        return Inertia::render('Faq/Index');
    }

    public function terms()
    {
        return Inertia::render('Terms/Index');
    }

    public function policy()
    {
        return Inertia::render('Policy/Index');
    }

    public function contact()
    {
        return Inertia::render('Contact/Index');
    }

    public function reservations()
    {
        $apartments = ApartmentResource::collection(
            Apartment::with(['features', 'images', 'reservations'])
            ->get()
        );

        return Inertia::render('Reservations/Index', ['apartments' => $apartments]);
    }

    public function checkout()
    {
        return Inertia::render('Checkout/Index');
    }
}
