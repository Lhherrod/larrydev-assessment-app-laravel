@component('mail::message')
# Introduction

Your Check-in status has been updated, upon logging in, you can now complete the assessment by clicking on the button down below.

@component('mail::button', ['url' => 'https://larrydev.com/assessment'])
Complete Assessment
@endcomponent

Thanks, again and thank you for choosing LarryDev Web Dev Aficionado for you web app needs!!<br>
{{ config('app.name') }}
@endcomponent
