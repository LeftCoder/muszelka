<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendReviewRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Mail\NewReview;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request)
    {
        Review::create([
            'author' => $request->safe()->author,
            'body' => $request->safe()->body
        ]);

        return redirect('/dashboard/opinie')
            ->with('message', 'Nowy opinia została dodana.');

    }

    public function send(SendReviewRequest $request)
    {
        $details = $request->validated();
        $details = $request->safe()->except(['captcha_token']);

        Mail::to(config('mail.from.address'))->send(new NewReview($details));

        return back()->with(['message' => 'Poszło! Dziękujemy za Twoją opinię.']);
    }

    public function create()
    {
        return Inertia::render('Dashboard/ReviewCreate');
    }

    public function edit(Review $review)
    {
        return Inertia::render('Dashboard/ReviewUpdate', ['review' => $review]);
    }

    public function update(Review $review, UpdateReviewRequest $request)
    {
        $review->update([
            'author' => $request->safe()->author,
            'body' => $request->safe()->body
        ]);

        return redirect('/dashboard/opinie')
            ->with('message', 'Informacje zaktualizowane.');
    }

    public function destroy(Review $review)
    {
        try {
            $review->delete();
        } catch (\Exception $e) {
            return back()->with('message', 'Nie można usunąć wybranej opinii.');
        }

        return redirect('/dashboard/opinie')
            ->with('message', 'Opinia została usunięta.');
    }

    public function published(Request $request, Review $review)
    {
        try {
            $review->published = $request->published;
            $review->save();

            return back();
        } catch (\ValueError $e) {
            return back()->with('message', 'Nie można zaktualizować');
        }
    }
}
