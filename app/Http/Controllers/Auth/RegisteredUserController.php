<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        $google_captcha_check = new GoogleCaptchaService(implode($request->safe()->only('g-recaptcha-response')));
        if($google_captcha_check->getCaptchaResponse() !== true){
            return back()->with('status', 'an error occurred...please try again, thank you.');
        }
        $user = new RegisteredUserService($request->validated());
        $registerd_user = $user->create();
        event(new Registered($registerd_user));
        Auth::login($registerd_user);
=======
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username
        ]);

        event(new Registered($user));

        Auth::login($user);

>>>>>>> master/master
        return redirect(RouteServiceProvider::HOME);
    }
}
