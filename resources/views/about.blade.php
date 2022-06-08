<meta name="robots" content="index, follow">
<title>About | LarryDev</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <x-guest-layout>
        <x-contact-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <h1 class="text-center text-3xl">About Page Coming Soon!!!</h1>
        </x-contact-card>
    </x-guest-layout>
</x-app-layout>
