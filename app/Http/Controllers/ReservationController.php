<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatus;
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
        $number = $this->generateNumber();

        $reservation = Reservation::create($validated);
        $reservation->number = $number;
        $reservation->save();

        $token = $this->createToken($reservation);

        Mail::to('muszelka@muszelkawicie.pl')->send(new ReservationMade($reservation, $number));
        Mail::to($reservation->email)->send(new ReservationConfirm($reservation, $token, $number));

        return Inertia::render('Checkout/Success');
    }

    public function confirmed(Token $token)
    {
        if ($token->expires_at->isPast()) {
            $token->delete();

            return abort(404);
        }

        $token->reservation->status = ReservationStatus::CONFIRMED;
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

    protected function createToken(Reservation $reservation): Token
    {
        return Token::create([
            'reservation_id' => $reservation->id,
            'expires_at' => now()->addHours(24),
            'token' => Str::random(64),
        ]);
    }

    protected function validateRequest(StoreReservationRequest $request): array
    {
        $validated = $request->validated();
        $validated = $request->safe()->except(['policy', 'max', 'captcha_token']);

        return $validated;
    }

    protected function generateNumber(): string
    {
        $prefix = '#MW/'.date('Y').'/';
        $latest_reservation = Reservation::latest('id')->first();
        $is_new_year = $this->isNewYear($latest_reservation);

        if ((! $latest_reservation) || $is_new_year) {
            return "{$prefix}0001";
        }

        $number = substr($latest_reservation->number, -4, 4);

        return  $prefix.sprintf('%04d', intval($number) + 1);
    }

    protected function isNewYear(Reservation $reservation): bool
    {
        $last_reservation_year = substr($reservation->number, 4, 4);

        if (date('Y') === $last_reservation_year) {
            return false;
        }

        return true;
    }
}
