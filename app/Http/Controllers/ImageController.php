<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return auth()->user()->images;
    }

    public function destroy (Image $image)
    {
        Storage::disk('public')->delete('/images/' . $image->name);
        $image->where('name', $image->name)->delete();
        return response()->json(['message' => 'picture deleted successfully...']);
    }
}