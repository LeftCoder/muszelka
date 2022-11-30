<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Exception;
use Inertia\Inertia;

class FaqController extends Controller
{
    public function Faqs()
    {
        return FaqResource::collection(Faq::all());
    }

    public function store(StoreFaqRequest $request)
    {
        Faq::create([
            'question' => $request->safe()->question,
            'answer' => $request->safe()->answer,
        ]);

        return redirect('/dashboard/faq')
            ->with('message', 'Nowe pytanie zostało dodane.');
    }

    public function create()
    {
        return Inertia::render('Dashboard/FaqCreate');
    }

    public function edit(Faq $faq)
    {
        return Inertia::render('Dashboard/FaqUpdate', ['faq' => $faq]);
    }

    public function update(Faq $faq, UpdateFaqRequest $request)
    {
        $faq->update([
            'question' => $request->safe()->question,
            'answer' => $request->safe()->answer,
        ]);

        return redirect('/dashboard/faq')
            ->with('message', 'Informacje zaktualizowane.');
    }

    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
        } catch (Exception $e) {
            return back()->with('message', 'Nie można usunąć pytania.');
        }

        return redirect('/dashboard/faq')
            ->with('message', 'Pytanie zostało usunięte.');
    }
}
