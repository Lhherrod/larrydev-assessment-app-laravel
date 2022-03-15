<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function destroy ($video) {
        Video::where('videoName', $video)->firstOrFail();
        $video = new Video;
        $video->where('videoName', $video)->delete();
        return back();
    }
}
