<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UserController extends Controller {

    public function index () {
        $user = auth()->user()->username;
        $adminStatus = UserService::adminStatus();
        $users = UserService::getAllUsers();
        return view('users.index', compact('adminStatus', 'user', 'users'));
    }

    public function update (UserUpdateRequest $request, $user) {
        
        if(auth()->user()->adminStatus != 1) {
            die('YOU ARE NOT THE ADMIN!');
        }

        UserService::getUpdateUserStatus($request, $user);
        
        return back();
       

    }


}
