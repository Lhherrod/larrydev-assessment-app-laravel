<?php

namespace App\Actions;

use App\Enums\Status;
use App\Services\AssessmentService;
use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class AssessmentAction
{
    use AsAction;

    public function asController()
    {
        $user = auth()->user()->username;
        $assessmentCheckInStatus = Status::ASSESSMENT_CHECK_IN_STATUS_ZERO;
        $variable = Status::ALL_STATUSES;
        foreach ($variable as $key => $value) {
           echo($value);
        }
        return;
        // $assessmentStatus = Status::ASSESSMENT_STATUS_ZERO;
        $checkAssessmentStatus = AssessmentService::getCheckAssessmentStatus();
        $checkAssessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();

        return view('assessment.index')->with([
            'user' => $user,
            'assessment_status' => Status::ASSESSMENT_STATUS_ZERO,
            'check_in_status' => $assessmentCheckInStatus,
            'checkAssessmentStatus' => $checkAssessmentStatus,
            'checkAssessmentCheckInStatus' => $checkAssessmentCheckInStatus
        ]);
    }
}
