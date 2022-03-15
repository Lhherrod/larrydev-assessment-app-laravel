<?php

namespace App\Services;

use App\Enums\Status;
use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Functions\GetStatus;


class UserService {


    static function createUser($request) {
     
        $request = $request->validated();
        $request['password'] = Hash::make($request['password']);
        $request['email'] = strtolower(($request['email']));
        $request['name'] = ucwords(($request['name']));
        $request['username'] = ucwords(($request['username']));

        $registeredUser = User::create($request + [
            'assessmentStatus' => GetStatus::setStatus(Status::ASSESSMENT_STATUS),
            'adminStatus' => GetStatus::setStatus(Status::ADMIN_STATUS),
            'assessmentCheckInStatus' => GetStatus::setStatus(Status::ASSESSMENT_CHECK_IN_STATUS),
        ]);    
    
        return $registeredUser;
    }

    static function adminStatus () {
        $adminStatus = auth()->user()->adminStatus;
        return $adminStatus;
        
    }

    static function getAllUsers () {
        $users = User::get();
        return $users;
    }

    private function updateUserStatus($request, $user): void {

        $email = User::where('username', $user )->get('email');
        $userUpdate = new User();

        if($request->input('assessmentCheckInStatus') == null) {
            $userUpdate->assessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();
        }
        else {
            $userUpdate->where('username', $user)->update(['assessmentCheckInStatus' => $request->input('assessmentCheckInStatus')]);
        }


        if($request->input('assessmentCheckInStatus')) {
            Mail::to($email)->send(new HelloMail());
        }
       

        if($request->input('assessmentStatus') == null) {
            $userUpdate->assessmentStatus = AssessmentService::getCheckAssessmentStatus();
        }
        else {
            $userUpdate->where('username', $user)->update(['assessmentStatus' => $request->input('assessmentStatus')]);
        }
        
        return;
    }

    static function getUpdateUserStatus ($request, $user) {
        $getUpdateUserStatus = new UserService();
        return $getUpdateUserStatus->updateUserStatus($request, $user);
    }


}

