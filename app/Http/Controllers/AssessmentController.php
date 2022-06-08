<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Assessment;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use App\Services\AssessmentService;
use App\Services\MediaService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AssessmentController extends Controller
{
    public function store(AssessmentRequest $request): RedirectResponse
    {
        Assessment::create($request->validated() + [
            'username' => auth()->user()->username
        ]);
        AssessmentService::getUpdateAssessmentStatus();
        return redirect(route('assessment.index'))->with('status', 'Assessment Completed, Thank You.');
    }

    public function edit(User $user): View
    {
        $getAssessment = Assessment::where('username', $user->username)->get();
        $getImages = Image::where('username', $user->username)->get();
        $getVideos = Video::where('username', $user->username)->get();
        return view('assessment.edit', compact('getAssessment', 'getImages', 'getVideos'));
    }

    public function update(AssessmentUpdateRequest $request, ImageRequest $image, $user): RedirectResponse
    {
        AssessmentService::getUpdateAssessment($request, $user, $image);
        MediaService::getUpdateImage($request);
        MediaService::getUpdateVideo($request);
        return redirect(route('assessment.edit', $user))->with('status', 'Assessment updated successfully.');
    }
}
