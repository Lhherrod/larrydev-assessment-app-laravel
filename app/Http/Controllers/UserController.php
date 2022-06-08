<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Functions\GetStatus;
use App\Http\Requests\UserUpdateRequest;
use App\Mail\LarryDevAssessmentUpdate;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function update (UserUpdateRequest $request, $user): RedirectResponse
    {
        if(auth()->user()->adminStatus == GetStatus::setStatus(Status::ADMIN_STATUS_ZERO)) {
            die('YOU ARE NOT THE ADMIN!');
        }
        UserService::getUpdateUserStatus($request, $user);
        return redirect(route('users.index'))->with('status', 'User updated successfully..');
    }
}
