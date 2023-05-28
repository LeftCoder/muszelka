<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request)
    {
        Review::create([
            'body' => $request->safe()->body,
            'author' => $request->safe()->author
        ]);

        return redirect('/')
            ->with('message', 'Nowa opinia została dodana.');
    }

    public function create()
    {
        return Inertia::render('Dashboard/ReviewCreate');
    }

    public function edit(Review $review)
    {
        return Inertia::render('Dashboard/ReviewUpdate', ['Review' => $review]);
    }

    public function update(Review $review, UpdateReviewRequest $request)
    {
        $review->update([
            'published' => $request->safe()->published
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
}
