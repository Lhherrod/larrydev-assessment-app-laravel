<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller
{

    public function destroy ($picture) {
        Image::where('imageName', $picture)->firstOrFail();
        $image = new Image;
        $image->where('imageName', $picture)->delete();
        return back();
    }

}
