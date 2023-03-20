<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dark:bg-slate-900">
        <!-- Navbar -->
        @php
            $navlinks = [];
            $navlinks[] = [
                'path' => '/',
                'name' => 'Inicio',
                'submenu' => []
            ];
            $navlinks[] = [
                'path' => '#',
                'name' => 'Cuenta',
                'submenu' => [
                    [
                        'path' => route('register'),
                        'name' => 'Registro'
                    ],
                    [
                        'path' => route('login'),
                        'name' => 'Inicio de sesión'
                    ]
                ]
            ];

        @endphp
        <x-guest.guest-navbar :$navlinks />

        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @wireUiScripts
        @vite(['resources/js/alpine.js', 'resources/js/darkmode.js'])
    </body>
</html>
