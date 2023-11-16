<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    private int $id;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Assessment $assessment, Request $request)
    {
        $this->id = $assessment->id;

        // will turn this into a match expression
        if($request->file('file')->getMimeType() === 'image/png') {
            $this->storeImage($request->file('file'));
            return response()->json(['success' => $request->file('file')->getClientOriginalName()]);
        } elseif($request->file('file')->getMimeType() === 'video/mp4') {
            $this->storeVideo($request->file('file'));
            return response()->json(['success' => $request->file('file')->getClientOriginalName()]);
        } else {
            return response()->json(['failed' => 'Sorry...This file type is not supported...'], 422);
        }
    }

    public function storeImage($file)
    {
        $new_name = Str::replace(' ', '-', $file->getClientOriginalName());
        $image = new Image();
        $image->name = $file->getClientOriginalName();
        $image->assessment_id = $this->id;
        $image->path = $new_name;
        $image->ulid = Str::ulid();
        $image->save();
        $file->move(storage_path('app/public/images/'), $new_name);
    }

    public function storeVideo($file)
    {
        $new_name = Str::replace(' ', '-', $file->getClientOriginalName());
        $video = new Video();
        $video->name = $file->getClientOriginalName();
        $video->assessment_id = $this->id;
        $video->path = $new_name;
        $video->ulid = Str::ulid();
        $video->save();
        $file->move(storage_path('app/public/videos/'), $new_name);
    }
}