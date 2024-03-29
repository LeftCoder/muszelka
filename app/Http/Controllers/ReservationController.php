<?php

namespace App\Http\Controllers;

use App\Enums\ReservationStatus;
use App\Http\Requests\StoreReservationRequest;
use App\Mail\ReservationConfirm;
use App\Mail\ReservationMade;
use App\Models\Apartment;
use App\Models\Reservation;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function store(StoreReservationRequest $request)
    {
        $validated = $this->validateRequest($request);
        $number = $this->generateNumber();

        $reservation = Reservation::create($validated);
        $reservation->number = $number;
        $reservation->save();

        $token = $this->createToken($reservation);

        Mail::to(config('mail.from.address'))->send(new ReservationMade($reservation, $number));
        Mail::to($reservation->email)->send(new ReservationConfirm($reservation, $token, $number));

        return Inertia::render('Checkout/SuccessPage');
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

        return Inertia::render('Checkout/ConfirmedPage');
    }

    public function booked()
    {
        $booked = Reservation::toBase()
            ->selectRaw('count(*) as count')
            ->whereDate('created_at', Carbon::today())
            ->first();

        return response()->json([
            'booked' => intval($booked->count),
        ]);
    }

    public function stats()
    {
        $confirmed = Reservation::toBase()
            ->selectRaw('count(*) as count')
            ->where('status', ReservationStatus::CONFIRMED)
            ->first();

        $apartments = Apartment::toBase()
            ->selectRaw('count(*) as count')
            ->first();

        return response()->json([
            'confirmed' => intval($confirmed->count),
            'apartments' => intval($apartments->count),
        ]);
    }

    public function status(Request $request, Reservation $reservation)
    {
        try {
            $reservation->status = ReservationStatus::from($request->status);
            $reservation->save();

            return back();
        } catch (\ValueError $e) {
            return back()->with('message', 'Nie można zaktualizować');
        }
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
