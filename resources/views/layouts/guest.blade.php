<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#f5f5f2] text-[#1b1b18]">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">

            {{-- Logo --}}
            <div class="mb-6">
                <a href="/">
                    <x-application-logo class="w-24 h-auto fill-current text-[#f53003]" />
                </a>
            </div>

            {{-- Card --}}
            <div class="w-full sm:max-w-md overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">
                {{ $slot }}
            </div>

        </div>

    </body>
</html>