<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\LarryDevAssessmentUpdate;

class RegisteredUserService
{
    private array $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
    public function create()
    {
        $this->request['password'] = Hash::make($this->request['password']);
        $user = User::create($this->request);
        return $user;
    }
    // private function updateUserStatus ($request, $user)
    // {
    //     $userUpdate = new User;
    //     $userUpdate->where('username', $user)->update($request->validated() + [
    //         'username' => $user
    //     ]);
    //     Mail::to($userUpdate->where('username', $user)->get('email'))->send(new LarryDevAssessmentUpdate());
    //     return $userUpdate;
    // }
    // static function getUpdateUserStatus ($request, $user)
    // {
    //     $getUpdateUserStatus = new UserService($request);
    //     return $getUpdateUserStatus->updateUserStatus($request, $user);
    // }
}

