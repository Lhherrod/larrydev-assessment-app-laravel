<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(Assessment $assessment)
    {
        return Video::where('assessment_id', $assessment->id)->get(); 
    }

    public function destroy (Video $video)
    {
        Storage::disk('public')->delete('/videos/' . $video->name);
        $video->where('id', $video->id)->delete();
        return response()->json(['message' => 'video deleted successfully...']);
    }
}