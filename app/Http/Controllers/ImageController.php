<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy (Image $image)
    {
        Storage::disk('public')->delete('/images/' . $image->name);
        Image::where('name', $image->name)->delete();
        // return back()->with(['message' => 'picture deleted successfully...']);
        return response()->json(['message' => 'picture deleted successfully...'], 200);
    }
}
