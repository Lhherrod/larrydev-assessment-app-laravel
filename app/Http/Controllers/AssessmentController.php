<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AssessmentController extends Controller
{

    public function index(): View
    {   
        return view('assessment.index');
    }

    public function store(AssessmentRequest $request): RedirectResponse
    {
        Assessment::create($request->validated() + [
            'user_id' => auth()->user()->id
        ]);
        return redirect(route('assessment.index'))->with('status', 'assessment-completed');
    }

    public function edit(): View
    {
        return view('assessment.edit');
    }

    public function update(AssessmentUpdateRequest $request, $user): RedirectResponse
    {
        $assessment = new Assessment;
        $assessment->where('username', $user)->update($request->validated() + [
            'id' => auth()->user()->id
        ]);
        return redirect(route('assessment.edit', $user))->with('status', 'assessment-updated');
    }
}
