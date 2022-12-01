<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Filesystem\Filesystem;
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

    public function delete(Image $image)
    {
        if ($image) {
            $image_path = public_path().$image->src;
            if (unlink($image_path)) {
                $this->removeDirectoryIfEmpty($image->apartment->id);
            }

            $image->delete();
        }

        return '';
    }

    protected function removeDirectoryIfEmpty($folder)
    {
        $filesystem = new Filesystem();
        $directory = public_path()."/storage/houses/$folder";
        if ($filesystem->exists($directory)) {
            $files = $filesystem->files($directory);
            if (empty($files)) {
                $filesystem->deleteDirectory($directory);
            }
        }
    }
}
