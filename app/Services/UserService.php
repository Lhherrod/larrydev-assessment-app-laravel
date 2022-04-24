<?php

namespace App\Services;

use App\Enums\Status;
use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Functions\GetStatus;
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
        
        $foo = 'bar';

        $$foo = 'baz';

        echo $bar;

        $this->newPasswordObject = new HashPasswordService($this->request['password']);
        $this->hashedPassword = $this->newPasswordObject->getHashedPassword();        
        $this->request['password'] = $this->hashedPassword;
        $this->request['email'] = strtolower($this->request['email']);
        $this->request['name'] = ucwords(strtolower($this->request['name']));
        $this->request['username'] = ucwords(strtolower($this->request['username']));

        $registeredUser = User::create($this->request + [
            'assessmentStatus' => GetStatus::setStatus(Status::ASSESSMENT_STATUS),
            'adminStatus' => GetStatus::setStatus(Status::ADMIN_STATUS),
            'assessmentCheckInStatus' => GetStatus::setStatus(Status::ASSESSMENT_CHECK_IN_STATUS),
        ]);

        return $registeredUser;
    }

    public function getCreatedUser() {
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

    private function updateUserStatus($request, $user): void 
    {

        $email = User::where('username', $user )->get('email');
        // $userUpdate = new User();
        // User::update($request->all())->where('username', $user);

        // if($request->input('assessmentCheckInStatus') == null) {
        //     $userUpdate->assessmentCheckInStatus = AssessmentService::getAssessmentCheckInStatus();
        // }
        // else {
        //     $userUpdate->where('username', $user)->update(['assessmentCheckInStatus' => $request->input('assessmentCheckInStatus')]);
        // // }


        // if($request->input('assessmentCheckInStatus')) {
        //     Mail::to($email)->send(new HelloMail());
        // }
       

        // if($request->input('assessmentStatus') == null) {
            // $userUpdate->assessmentStatus = AssessmentService::getCheckAssessmentStatus();
        // }
        // else {
            // $userUpdate->where('username', $user)->update(['assessmentStatus' => $request->input('assessmentStatus')]);
        // }
        
        return;
    }

    // static function getUpdateUserStatus ($request, $user) 
    // {
    //     $getUpdateUserStatus = new UserService();
    //     return $getUpdateUserStatus->updateUserStatus($request, $user);
    // }


}

