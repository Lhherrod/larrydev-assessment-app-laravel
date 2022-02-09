<?php

namespace App\Services;

use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService {

    static function createUser($request) {

        $request = $request->validated();
        $request['password'] = Hash::make($request['password']);
        $request['email'] = strtolower(($request['email']));
        $request['name'] = ucwords(($request['name']));
        $request['username'] = ucwords(($request['username']));

        $registeredUser = User::create($request + [
            'assessmentStatus' => 0,
            'adminStatus' => 0,
            'assessmentCheckInStatus' => 0,
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

    private function updateUserStatus($request, $user) {

        $email = User::where('username', $user )->get('email');
        $userUpdate = new User();

        if($request->input('assessmentCheckInStatus') == null) {
            $userUpdate->assessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();
        }
        else {
            $userUpdate->where('username', $user)->update(['assessmentCheckInStatus' => $request->input('assessmentCheckInStatus')]);
        }

        Mail::to($email)->send(new HelloMail());

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

