<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Mail\ReservationConfirm;
use App\Mail\ReservationMade;
use App\Models\Reservation;
use App\Models\Token;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function show(Reservation $reservation)
    {
        return Inertia::render('Dashboard/SingleReservation', [
            'reservation' => new ReservationResource($reservation),
        ]);
    }

    public function store(StoreReservationRequest $request)
    {
        $validated = $this->validateRequest($request);
        $reservation = Reservation::create($validated);
        $token = $this->createToken($reservation);

        Mail::to('muszelka@muszelkawicie.pl')->send(new ReservationMade($reservation));
        Mail::to($reservation->email)->send(new ReservationConfirm($reservation, $token));

        return Inertia::render('Checkout/Success');
    }

    public function confirmed(Token $token)
    {
        if ($token->expires_at->isPast()) {
            $token->delete();

            return abort(404);
        }

        $token->reservation->confirmed = true;
        $token->reservation->save();

        $token->delete();

        return Inertia::render('Checkout/Confirmed');
    }

    public function booked()
    {
        return Reservation::toBase()
            ->selectRaw('count(*) as booked')
            ->where('start', now()->format('Y-m-d'))
            ->first();
    }

    protected function createToken(Reservation $reservation)
    {
        return Token::create([
            'reservation_id' => $reservation->id,
            'expires_at' => now()->addHours(24),
            'token' => Str::random(64),
        ]);
    }

    protected function validateRequest(StoreReservationRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->except(['policy', 'max', 'captcha_token']);

        return $validated;
    }
}
