<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Period;
use Inertia\Inertia;

class PeriodController extends Controller
{
    public function store(StorePeriodRequest $request)
    {
        Period::create([
            'start' => $request->safe()->start,
            'end' => $request->safe()->end,
            'small' => $request->safe()->small,
            'big' => $request->safe()->big,
        ]);

        return redirect('/dashboard/cennik')
            ->with('message', 'Nowy termin został dodany.');
    }

    public function create()
    {
        return Inertia::render('Dashboard/PeriodCreate');
    }

    public function edit(Period $period)
    {
        return Inertia::render('Dashboard/PeriodUpdate', ['period' => $period]);
    }

    public function update(Period $period, UpdatePeriodRequest $request)
    {
        $period->update([
            'start' => $request->safe()->start,
            'end' => $request->safe()->end,
            'small' => $request->safe()->small,
            'big' => $request->safe()->big,
        ]);

        return redirect('/dashboard/cennik')
            ->with('message', 'Informacje zaktualizowane.');
    }

    public function destroy(Period $period)
    {
        try {
            $period->delete();
        } catch (\Exception $e) {
            return back()->with('message', 'Nie można usunąć wybranego terminu.');
        }

        return redirect('/dashboard/cennik')
            ->with('message', 'Termin został usunięty.');
    }
}
