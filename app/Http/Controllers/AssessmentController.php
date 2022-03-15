<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Assessment;
use App\Models\Image;
use App\Models\Video;
use App\Services\AssessmentService;
use App\Services\MediaService;

class AssessmentController extends Controller {
    
    public function store(AssessmentRequest $request ) {   
        
        Assessment::create($request->validated() + [
            'username' => auth()->user()->username
        ]);

        AssessmentService::getUpdateAssessmentStatus();

        return redirect('/assessment')->with('status', 'Assessment Completed, Thank You.');
    }
    

    public function edit($user) {   
        
        $getAssessment = Assessment::where('username', $user)->firstOrFail()->get();
        $getMedias = Image::where('username', $user)->get();
        $getVideos = Video::where('username', $user)->get();

        return view('assessment.edit', compact('getAssessment', 'getMedias', 'getVideos'));
        
    }

    public function update(AssessmentUpdateRequest $request, ImageRequest $image, $user) {   
        
        
        AssessmentService::getUpdateAssessment($request, $user, $image);
        MediaService::getUpdateImage($request);
        MediaService::getUpdateVideo($request);

        return redirect('/assessment/' . $user . '/edit')->with('status', 'Assessment updated successfully.'); 
       
    }

}
