<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:view,assessment'])->only(['edit']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {   
        return view('assessment.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentRequest $request): RedirectResponse
    {
        Assessment::create($request->validated() + [
            'user_id' => auth()->user()->id,
            'ulid' => \Illuminate\Support\Str::ulid()
        ]);
        return redirect(route('assessment.index'))->with('status', 'assessment-completed');
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
        return back()->with('status', 'assessment-updated');
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