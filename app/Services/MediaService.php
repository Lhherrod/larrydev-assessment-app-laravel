<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Image;
use App\Models\Video;
use Symfony\Component\HttpFoundation\FileBag;

class MediaService
{
    public function process(FileBag $files)
    {
        dd($files);
    }
    
    public static function createImage (FileBag $files): void
    {
        // if($request->hasfile('image_name')) {
            foreach($files as $file) {
                $image = new Image();
                //get sluggable?
                $fileName = str_replace(' ', '-' , strtolower(auth()->user()->username . '-' . $file->hashName()));
                $file->move(storage_path('app/public/images'), $fileName);
                $image->name = $fileName;
                $image->path = $fileName;
                $image->user_id = auth()->user()->id;
                $image->save();
            }
        // }
    }

    public static function createVideo (FileBag $files): void
    {
        // if($request->hasfile('video_name')) {
            foreach($files as $file) {
                $video = new Video();
                //get sluggable?
                $fileName = str_replace(' ', '-' , strtolower(auth()->user()->username . '-' . $file->hashName()));
                $file->move(storage_path('app/public/videos'), $fileName);
                $video->name = $fileName;
                $video->path = $fileName;
                $video->id = auth()->user()->id;
                $video->save();
            }
        // }
    }
}
