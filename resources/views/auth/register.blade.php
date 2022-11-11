<meta name="robots" content="noindex, nofollow">
<title>Register | LarryDev</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register') }}
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
            <form method="POST" action="{{ route('register') }}" id="demo-form">
                @csrf
                @honeypot
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-input-label for="username" :value="__('Username')" />

                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button
                        class="ml-4 g-recaptcha"
                        data-sitekey="{{ config('app.GOOGLE_CAPTCHA_SITE_KEY') }}"
                        data-callback='onSubmit'
                        data-action='register'>
                        {{ __('Register') }}
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

