<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    @if (session('status') === 'contact-recieved')
        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Contact request recieved! Thank you...') }}
        </p>
    @endif
    <p class="text-gray-500">Please enter your details down below...</p>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('contact.store') }}" id="contact-form">
        @csrf
        @honeypot
        <input type="hidden" name="g-recaptcha-response" value="">

        <div>
            <x-input-label for="contact_name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        
        <div class="mt-4">
            <x-input-label for="contact_email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>
        <div class="mt-4">
            <x-input-label for="contact_inquiry" :value="__('Inquiry')" />
            <x-text-input id="" class="block mt-1 w-full" type="text" name="inquiry" :value="old('inquiry')" required />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button
                onclick="onSubmit(event)"
                type="submit"
                class="ml-4">
                {{ __('Submit') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>

<script>
    let siteKey = '<?php echo config('app.google_captcha_site_key') ?>'

    function onSubmit(event) {
        if (!event.target.form.checkValidity()) {
            return;
        }

        event.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute(siteKey, { action: 'contact' }).then(function(token) {
                event.target.form.elements['g-recaptcha-response'].value = token;
                event.target.form.submit();
            });
        });
    }
</script>