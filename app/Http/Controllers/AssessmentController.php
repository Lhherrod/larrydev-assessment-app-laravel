<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AssessmentController extends Controller
{

    public function __construct()
    {
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('assessment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentRequest $request): RedirectResponse
    {
        Assessment::create($request->validated() + [
            'user_id' => auth()->user()->id
        ]);
        return redirect(route('assessment.index'))->with('status', 'assessment-completed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        //
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