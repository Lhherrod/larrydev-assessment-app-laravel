<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function destroy (Video $video)
    {
        Video::where('videoName', $video->videoName)->delete();
        return back()->with('status', 'video deleted successfully..');
    }
}
