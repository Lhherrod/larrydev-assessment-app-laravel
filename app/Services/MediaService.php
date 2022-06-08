<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class MediaService
{
    private function updateImage ($request)
    {
        if($request->hasfile('imageName')) {
            foreach($request->file('imageName') as $file) {
                $image = new Image();
                $fileName = uniqid() . '-' . str_replace(' ', '-' , strtolower($file->hashName()));
                $file->move(storage_path('app/public/images'), $fileName);
                $image->imageName = $fileName;
                $image->imagePath = $fileName;
                $image->userName = Auth::user()->username;
                $image->save();
            }
        }
    }

    static function getUpdateImage ($request)
    {
        $getUpdateImage = new MediaService;
        return $getUpdateImage->updateImage($request);
    }

    private function updateVideo ($request)
    {
        if($request->hasfile('videoName')) {
            foreach($request->file('videoName') as $videoFile) {
                $video = new Video();
                $fileName = uniqid() . '-' . str_replace(' ', '-' , strtolower($videoFile->hashName()));
                $videoFile->move(storage_path('app/public/videos'), $fileName);
                $video->videoName = $fileName;
                $video->videoPath = $fileName;
                $video->userName = Auth::user()->username;
                $video->save();
            }
        }
    }

    static function getUpdateVideo ($request)
    {
        $getUpdateVideo = new MediaService;
        return $getUpdateVideo->updateVideo($request);
    }
}
