<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy (Image $picture)
    {
        Storage::disk('public')->delete('/images/' . $picture->name);
        Image::where('name', $picture->name)->delete();
        // return back()->with(['message' => 'picture deleted successfully...']);
        return response(['message' => 'picture deleted successfully...'], 200);
    }
}
