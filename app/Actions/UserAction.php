<?php

namespace App\Actions;

use App\Enums\Status;
use App\Functions\GetStatus;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class UserAction
{
    use AsAction;

    public function asController(): View
    {
        $users = UserService::getAllUsers();
        $assessmentStatus = GetStatus::setStatus(Status::ASSESSMENT_STATUS_ZERO);
        return view('users.index')->with([
            'users' => $users,
            'assessmentStatus' => $assessmentStatus
        ]);
    }
}
