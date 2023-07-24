<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('{{ asset('log2.jpg') }}');background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div>
                <a href="/">
                    <!-- <x-application-logo class="w-20 h-20 fill-current text-white" /> -->
                    <img src="{{ asset('logo.png') }}" class="w-36 h-36"></img>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-6 py-4 bg-transparent shadow-2xl overflow-hidden sm:rounded-lg border-solid border-2">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
