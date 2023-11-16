<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(Assessment $assessment)
    {
        return Image::where('assessment_id', $assessment->id)->get(); 
    }

    public function destroy (Image $image)
    {
        Storage::disk('public')->delete('/images/' . $image->name);
        $image->where('id', $image->id)->delete();
        return response()->json(['message' => 'picture deleted successfully...']);
    }
}