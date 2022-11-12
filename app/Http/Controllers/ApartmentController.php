<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApartmentController extends Controller
{
    public function occupied(Request $request, Apartment $apartment)
    {
        $apartment->occupied = $request->input('occupied');
        $apartment->save();

        return back()->with(['message' => 'Zmiana wykonana.']);
    }

    public function show(Apartment $apartment)
    {
        return Inertia::render('Dashboard/SingleApartment', ['apartment' => new ApartmentResource($apartment)]);
    }
}
