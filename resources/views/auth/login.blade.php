<meta name="robots" content="noindex, nofollow">
<title>Login | LarryDev</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Login') }}
        </h2>
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-input-error :messages="$errors->all()" class="mt-2" />
            <form method="POST" action="{{ route('login') }}" id="demo-form">
                @csrf
                @honeypot
                <div>
                    <x-input-label for="username" :value="__('Username')" />

                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                    />
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-primary-button
                        class="ml-4 g-recaptcha"
                        data-sitekey="{{ config('app.GOOGLE_CAPTCHA_SITE_KEY') }}"
                        data-callback='onSubmit'
                        data-action='login'>
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
</x-app-layout>
<script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
</script>

