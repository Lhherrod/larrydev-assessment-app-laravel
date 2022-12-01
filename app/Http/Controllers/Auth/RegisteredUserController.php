<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisteredUserRequest;
use App\Providers\RouteServiceProvider;
use App\Services\GoogleCaptchaService;
use App\Services\RegisteredUserService;
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
        $google_captcha_check = new GoogleCaptchaService(implode($request->safe()->only('g-recaptcha-response')));
        if($google_captcha_check->getCaptchaResponse() !== true){
            return back()->with('status', 'an error occurred...please try again, thank you.');
        }
        $user = new RegisteredUserService($request->validated());
        $registerd_user = $user->create();
        event(new Registered($registerd_user));
        Auth::login($registerd_user);
        return redirect(RouteServiceProvider::HOME);
    }
}
