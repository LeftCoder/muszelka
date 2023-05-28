<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\ReviewResource;
use App\Models\Apartment;
use App\Models\Faq;
use App\Models\Review;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function home()
    {
        $reviews = ReviewResource::collection(Review::where('published', true)->get());

        return Inertia::render('Home/Index', ['reviews' => $reviews]);
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
        $faqs = FaqResource::collection(
            Faq::all()
        );

        return Inertia::render('Faq/Index', ['faqs' => $faqs]);
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

    public function reservation()
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
