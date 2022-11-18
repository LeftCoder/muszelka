<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\Facades\Image as InterventionImage;

class ApartmentController extends Controller
{
    public function occupied(Request $request, Apartment $apartment)
    {
        $apartment->occupied = $request->input('occupied');
        $apartment->save();

        return back();
    }

    public function update(Apartment $apartment, Request $request)
    {
        if ($request->has('folders')) {
            foreach ($request->folders as $folder) {
                $tmp_image = TemporaryImage::where('folder', $folder)->first();

                if ($tmp_image) {
                    $this->moveTempImage($tmp_image, $apartment);
                    $this->createImage($tmp_image, $apartment);
                    $this->deleteTempImage($tmp_image);
                }
            }
        }

        $apartment->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'max' => $request->max,
        ]);

        return back()->with('message', 'Informacje zaktualizowane.');
    }

    public function show(Apartment $apartment)
    {
        $apartment = new ApartmentResource(Apartment::with(['features', 'images'])->first());

        return Inertia::render('Dashboard/SingleApartment', ['apartment' => $apartment]);
    }

    public function moveTempImage(TemporaryImage $tmp_image, Apartment $apartment)
    {
        Storage::copy(
            "tmp/{$tmp_image->folder}/{$tmp_image->file}",
            "houses/{$apartment->id}/{$tmp_image->file}"
        );
    }

    public function createImage(TemporaryImage $tmp_image, Apartment $apartment)
    {
        $path = "/storage/houses/{$apartment->id}/{$tmp_image->file}";
        $insert = InterventionImage::make(public_path().$path);

        Image::create([
            'src' => $path,
            'thumbnail' => $path,
            'width' => $insert->width(),
            'height' => $insert->height(),
            'alt' => $apartment->name,
            'apartment_id' => $apartment->id,
        ]);
    }

    public function deleteTempImage(TemporaryImage $tmp_image)
    {
        Storage::deleteDirectory("tmp/{$tmp_image->folder}");
        $tmp_image->delete();
    }
}
