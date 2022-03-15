<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Functions\GetStatus;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller {

    public function update (UserUpdateRequest $request, $user): RedirectResponse {
        
        if(auth()->user()->adminStatus == GetStatus::setStatus(Status::ADMIN_STATUS)) {
            die('YOU ARE NOT THE ADMIN!');
        }

        UserService::getUpdateUserStatus($request, $user);
        
        return back();
       
    }

}
