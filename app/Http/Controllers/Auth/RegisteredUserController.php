<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisteredUserRequest;
use App\Providers\RouteServiceProvider;
use App\Services\ContactService;
use App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{

    public function create() {
        return view('auth.register');
    }

    public function store(RegisteredUserRequest $request) {
        
        ContactService::getCaptcha();

        $registeredUser = UserService::createUser($request);

        event(new Registered($registeredUser));

        Auth::login($registeredUser);

        return redirect(RouteServiceProvider::HOME);
    }
}
