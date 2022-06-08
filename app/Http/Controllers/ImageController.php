<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy (Image $picture)
    {
        // dd(storage_path() . '\storage\images\\' . $picture->imageName);
        Storage::delete(public_path() . '\storage\images\\' . $picture->imageName);
        Image::where('imageName', $picture->imageName)->delete();
        return back()->with('status', 'picture deleted successfully..');
    }
}
