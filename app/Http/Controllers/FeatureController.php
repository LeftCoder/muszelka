<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeatureResource;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function features() {
        return FeatureResource::collection(Feature::all());
    }
}
