<?php

namespace App\Actions;

use App\Enums\Status;
use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class DashboardAction
{
    use AsAction;

    public function asController(): View
    {
        $assessmentCheckInStatus = Status::ASSESSMENT_CHECK_IN_STATUS_ZERO;
        $assessmentStatus = Status::ASSESSMENT_STATUS_ZERO;

        return view('dashboard',with([
            'assessmentCheckInStatus' => $assessmentCheckInStatus,
            'assessmentStatus' => $assessmentStatus
        ]));
    }
}
