<meta name="robots" content="index, follow">
<title>Contact | LarryDev</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <x-contact-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <p>Please enter your details down below.</p>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST"  action="{{ route('contact.store') }}" id="demo-form">
                @csrf
                @honeypot
                <div>
                    <x-label for="contact_name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" required autofocus />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="contact_email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" required />
                </div>
                <div class="mt-4">
                    <x-label for="contact_inquiry" :value="__('Inquiry')" />

                    <x-input id="" class="block mt-1 w-full" type="text" name="contact_inquiry" :value="old('contact_inquiry')" required />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button
                        class="ml-4 g-recaptcha"
                        data-sitekey="{{ config('app.GOOGLE_CAPTCHA_SITE_KEY') }}"
                        data-callback='onSubmit'
                        data-action='contact'>
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>
        </x-contact-card>
    </x-guest-layout>
</x-app-layout>

<script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
</script>
