<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index, follow">
        
        <title>Contact | LarryDev</title>
        <script src="https://www.google.com/recaptcha/api.js"></script>


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
       
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">

                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('landing') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                </a>
                            </div>
            
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('') }}
                                </x-nav-link>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Contact
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="shrink-0 flex items-center mb-4">
                                    
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                    <span class="ml-2">Please enter your details down below</span>

                                </div>

                                    
                                <x-slot name="logo">
                                    <a href="/">
                                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                    </a>
                                </x-slot>

                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                
                            
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            
                                <form method="POST"  action="{{ route('contact.create') }}" id="demo-form">
                                    @csrf
                                    @honeypot
                        
                                    <!-- Name -->
                                    <div>
                                        <x-label for="contact_name" :value="__('Name')" />
                        
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" required autofocus />
                                    </div>
                        
                        
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-label for="contact_email" :value="__('Email')" />
                        
                                        <x-input id="email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" required />
                                    </div>

                                    {{-- INQUIRY FIELD BOX --}}
                                    <div class="mt-4">
                                        <x-label for="contact_inquiry" :value="__('Inquiry')" />
                        
                                        <x-input id="" class="block mt-1 w-full" type="text" name="contact_inquiry" :value="old('contact_inquiry')" required />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        
                        
                                        <x-button 
                                            class="ml-4 g-recaptcha"
                                            data-sitekey="6LeO1WAeAAAAALVcVyGS235lSsfo5FhqeETo9BKm" 
                                            data-callback='onSubmit' 
                                            data-action='contact'>
                                            {{ __('Submit') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>   

       
        <script>
            function onSubmit(token) {
              document.getElementById("demo-form").submit();
            }
        </script>
         
        
      
    </body>
</html>
