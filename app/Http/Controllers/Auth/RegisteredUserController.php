<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisteredUserRequest;
use App\Providers\RouteServiceProvider;
use App\Services\GoogleCaptchaService;
use App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisteredUserRequest $request): RedirectResponse
    {
        GoogleCaptchaService::GetCaptchaResponse($request->input('g-recaptcha-response'));
        $registeredUser = new UserService($request);
        (new Registered($registeredUser));
        Auth::login($registeredUser->getCreatedUser());
        return redirect(RouteServiceProvider::HOME);
    }
}
