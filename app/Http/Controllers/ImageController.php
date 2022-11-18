<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = uniqid('apartment-', true);
            $filename = $filename = uniqid().'-'.$image->getClientOriginalName();

            $image->storeAs("tmp/{$folder}", $filename);

            TemporaryImage::create([
                'folder' => $folder,
                'file' => $filename,
            ]);

            return $folder;
        }

        return '';
    }

    public function destroy(Request $request)
    {
        $tmp_image = TemporaryImage::where('folder', $request->getContent())->first();

        if ($tmp_image) {
            Storage::deleteDirectory("tmp/{$tmp_image->folder}");
            $tmp_image->delete();
        }

        return '';
    }
}
