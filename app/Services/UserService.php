<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Functions\GetStatus;
use App\Mail\LarryDevAssessmentUpdate;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    private string $hashedPassword;
    private object $newPasswordObject;
    private array $request;

    public function __construct(object $request)
    {
        $this->request = $request->validated();

        return $this->request;
    }

    private function createUser(): Authenticatable
    {
        $this->newPasswordObject = new HashPasswordService($this->request['password']);
        $this->hashedPassword = $this->newPasswordObject->getHashedPassword();
        $this->request['password'] = $this->hashedPassword;

        $registeredUser = User::create($this->request + [
            'assessmentStatus' => GetStatus::setStatus(Status::ASSESSMENT_STATUS_ZERO),
            'adminStatus' => GetStatus::setStatus(Status::ADMIN_STATUS_ZERO),
            'assessmentCheckInStatus' => GetStatus::setStatus(Status::ASSESSMENT_CHECK_IN_STATUS_ZERO),
        ]);

        return $registeredUser;
    }

    public function getCreatedUser()
    {
        return $this->createUser();
    }

    static function adminStatus ()
    {
        $adminStatus = auth()->user()->adminStatus;
        return $adminStatus;
    }

    static function getAllUsers ()
    {
        $users = User::get();
        return $users;
    }

    private function updateUserStatus ($request, $user)
    {
        $userUpdate = new User;
        $userUpdate->where('username', $user)->update($request->validated() + [
            'username' => $user
        ]);
        Mail::to($userUpdate->where('username', $user)->get('email'))->send(new LarryDevAssessmentUpdate());
        return $userUpdate;
    }

    static function getUpdateUserStatus ($request, $user)
    {
        $getUpdateUserStatus = new UserService($request);
        return $getUpdateUserStatus->updateUserStatus($request, $user);
    }
}

