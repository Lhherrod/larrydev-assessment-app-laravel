<?php

namespace App\Actions;

use App\Enums\Status;
use App\Services\AssessmentService;
use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class AssessmentAction
{
    use AsAction;

    public function asController(): View
    {
        $user = auth()->user()->username;
        $assessmentCheckInStatus = Status::ASSESSMENT_CHECK_IN_STATUS_ZERO;
        $assessmentStatus = Status::ASSESSMENT_STATUS_ZERO;
        $checkAssessmentStatus = AssessmentService::getCheckAssessmentStatus();
        $checkAssessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();

        return view('assessment.index')->with([
            'user' => $user,
            'assessmentStatus' => $assessmentStatus,
            'assessmentCheckInStatus' => $assessmentCheckInStatus,
            'checkAssessmentStatus' => $checkAssessmentStatus,
            'checkAssessmentCheckInStatus' => $checkAssessmentCheckInStatus
        ]);
    }
}
