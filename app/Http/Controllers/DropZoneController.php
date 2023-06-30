<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    public function store(Request $request)
    {
        $request->file('file')->getClientOriginalExtension() === 'mp4' ? 
        $request->file->move(storage_path('app/public/videos/'),  $request->file('file')->getClientOriginalName()) :
        $request->file->move(storage_path('app/public/images/'),  $request->file('file')->getClientOriginalName());
        
        if($request->file('file')->getClientOriginalExtension() === 'mp4') {
            $video = new Video;
            $video->name =  $request->file('file')->getClientOriginalName();
            $video->path = 'videos/' .  $request->file('file')->getClientOriginalName();
            $video->user_id = auth()->user()->id;
            $video->save();
        } else {
            $image = new Image;
            $image->name =  $request->file('file')->getClientOriginalName();
            $image->path = 'images/' .  $request->file('file')->getClientOriginalName();
            $image->user_id = auth()->user()->id;
            $image->save();
        }
        return response()->json(['success' => $request->file('file')->getClientOriginalName()]);
    }
}