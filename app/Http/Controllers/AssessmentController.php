<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Assessment::class, 'assessment');
    }

    public function create()
    {   
        $url = URL::temporarySignedRoute(
            'assessment.store',
            now()->addHours(5)
        );
        
        return view('assessment.create',['url' => $url]);
    }

    public function show(Assessment $assessment)
    {   
        return view('assessment.show',['asssessment' => $assessment]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentRequest $request): RedirectResponse
    {
        $assessment = Assessment::create($request->validated() + [
            'ulid' => Str::ulid(),
            'signature' => $request->get('signature')
        ]);

        session()->flash('status', 'assessment-completed');

        return redirect(
            route('assessment.show', [
                'assessment' => $assessment->ulid
            ])
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment): View
    {

        return view('assessment.edit', compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssessmentUpdateRequest $request, Assessment $assessment): RedirectResponse
    {
        $assessment->where('id', $assessment->id)->update($request->validated());
        session()->flash('status', 'assessment-updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment): RedirectResponse
    {
        $assessment->delete();
        return redirect(route('assessment.index'))->with('status', 'assessment-deleted');
    }
}