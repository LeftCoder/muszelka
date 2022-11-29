<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Exception;
use Inertia\Inertia;

class FeatureController extends Controller
{
    public function features()
    {
        return FeatureResource::collection(Feature::all());
    }

    public function store(StoreFeatureRequest $request)
    {
        Feature::create([
            'name' => $request->safe()->name,
        ]);

        return redirect('/dashboard/udogodnienia')
            ->with('message', 'Nowe udogodnienie zostało dodane.');
    }

    public function create()
    {
        return Inertia::render('Dashboard/FeatureCreate');
    }

    public function edit(Feature $feature)
    {
        return Inertia::render('Dashboard/FeatureUpdate', ['feature' => $feature]);
    }

    public function update(Feature $feature, UpdateFeatureRequest $request)
    {
        $feature->update([
            'name' => $request->safe()->name,
        ]);

        return redirect('/dashboard/udogodnienia')
            ->with('message', 'Informacje zaktualizowane.');
    }

    public function destroy(Feature $feature)
    {
        try {
            $feature->delete();
        } catch (Exception $e) {
            return back()->with('message', 'Nie można usunąć udogodnienia.');
        }

        return redirect('/dashboard/udogodnienia')
            ->with('message', 'Udogodnienie zostało usunięte.');
    }
}
