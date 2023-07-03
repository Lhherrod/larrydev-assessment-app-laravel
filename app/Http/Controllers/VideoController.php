<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        return auth()->user()->videos;
    }

    public function destroy (Video $video)
    {
        Storage::disk('public')->delete('/videos/' . $video->name);
        Video::where('id', $video->id)->delete();
        return response()->json(['message' => 'video deleted successfully...'], 200);
    }
}
