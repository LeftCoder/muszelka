<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Database\QueryException;
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

    public function create()
    {
        return Inertia::render('Dashboard/ApartmentCreate');
    }

    public function store(StoreApartmentRequest $request)
    {
        $apartment = Apartment::create([
            'name' => $request->safe()->name,
            'description' => $request->safe()->description,
            'price' => $request->safe()->price,
            'max' => $request->safe()->max,
        ]);

        $this->addPhotos($request, $apartment);

        return redirect('/dashboard/domki')
            ->with('message', 'Nowy domek został dodany.');
    }

    public function update(Apartment $apartment, UpdateApartmentRequest $request)
    {
        $this->addPhotos($request, $apartment);

        $apartment->update([
            'name' => $request->safe()->name,
            'description' => $request->safe()->description,
            'price' => $request->safe()->price,
            'max' => $request->safe()->max,
        ]);

        return redirect('/dashboard/domki')
            ->with('message', 'Informacje zaktualizowane.');
    }

    public function edit(Apartment $apartment)
    {
        $apartment = new ApartmentResource(
            Apartment::with(['features', 'images'])
            ->where('id', $apartment->id)
            ->first()
        );

        return Inertia::render('Dashboard/ApartmentUpdate', ['apartment' => $apartment]);
    }

    public function destroy(Apartment $apartment)
    {
        try {
            $apartment->delete();
        } catch (QueryException $e) {
            return back()->with('message', 'Nie można usunąć domku.');
        }

        return redirect('/dashboard/domki')
            ->with('message', 'Domek został usunięty.');
    }

    protected function addPhotos($request, $apartment)
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
    }

    protected function moveTempImage(TemporaryImage $tmp_image, Apartment $apartment)
    {
        Storage::copy(
            "tmp/{$tmp_image->folder}/{$tmp_image->file}",
            "houses/{$apartment->id}/{$tmp_image->file}"
        );
    }

    protected function createImage(TemporaryImage $tmp_image, Apartment $apartment)
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

    protected function deleteTempImage(TemporaryImage $tmp_image)
    {
        Storage::deleteDirectory("tmp/{$tmp_image->folder}");
        $tmp_image->delete();
    }
}
