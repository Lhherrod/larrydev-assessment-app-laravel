<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class DropZoneController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        //get sluggable?
        // $fileName = str_replace(' ', '-' , strtolower(auth()->user()->username . '-' . $file->hashName()));
        $file_name = $file->getClientOriginalName();
        $file->move(storage_path('app/public/images/'), $file_name);
        
        $image = new Image;
        $image->name = $file_name;
        $image->path = 'images/' . $file_name;
        $image->user_id = auth()->user()->id;
        $image->save();
        return response()->json(['success' => $file_name]);
    }
}
