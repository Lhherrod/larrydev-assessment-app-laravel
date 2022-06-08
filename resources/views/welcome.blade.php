<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="description" content="Web Application Developer/Laravel The Web application assessment app by LarryDev Shop web applications to fit your everyday needs.">
        <meta name='revised' content='Sunday, June 8th, 2022, 12:00 am' >
        <meta name="robots" content="index, follow">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="icon"  href="https://larrydev.com/favicon.ico" type="image/x-icon">
        <title>{{ config('app.name') }}</title>
    </head>
    <body class="welcome_background">
        <header class="mt-2">
            <nav class="justify-center flex">
                <a class="github text-[2rem] cursor" target="_blank" href="https://github.com/lhherrod"><i class="fab fa-github text-gray-500"></i></a>
                <div class="border border-gray-500 my-auto h-7 mx-4"></div>
                @auth
                    <a href="{{ route('dashboard') }}"class="text-sm md:text-lg lg:text-2xl text-gray-700 dark:text-gray-500 underline my-auto">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm md:text-lg lg:text-2xl text-gray-700 dark:text-gray-500 my-auto underline">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 text-sm md:text-lg lg:text-2xl text-gray-700 dark:text-gray-500 my-auto underline">Register</a>
                @endauth
                <a href="{{ route('contact') }}"class="ml-4 text-sm md:text-lg lg:text-2xl text-gray-700 dark:text-gray-500 underline my-auto">Contact</a>
                <a href="{{ route('about') }}"class="ml-4 text-sm md:text-lg lg:text-2xl text-gray-700 dark:text-gray-500 underline my-auto">About</a>
            </nav>
        </header>
        <section class="mx-auto">
            <div class="my-auto h-full">
                <div class="content" class="mt-10">
                    <div class="top_div">
                        <h1 class="text-black mt-4 w-full sm:text-5xl lg:text-7xl opacity-50 bg-white absolute top-[3rem] sm:bg-white sm:text-2 sm:top-1/2">
                            {{ config('app.name') }}
                        </h1>
                        <video autoplay muted loop id="player" src="{{ asset('/storage/videos/webdevvideo.mp4') }}" type="video/mp4"></video>
                    </div>
                </div>
            </div>
        </section>
    </body>
    @include('cookie-consent::index')
</html>
