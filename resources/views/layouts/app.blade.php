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

        <!-- https://tailwind-elements.com/docs/standard/getting-started/quick-start/ -->

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased overflow-x-hidden bg-white dark:bg-slate-900">
        <x-banner />

        <div class="min-h-screen bg-white dark:bg-slate-900" x-data="{ hidden: true }">
            {{-- @livewire('navigation-menu') --}}

            <!-- Sidebar -->
            {{-- <x-helpers.sidebar /> --}}

            @can('show-admin-navigation')
                <x-auth.admin-navbar />
                <x-auth.admin-sidebar />
            @else
                <x-auth.user-navbar />
                <x-auth.user-sidebar />
            @endcan

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header>
                    <div>
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <x-helpers.footer />

        @stack('modals')

        @livewireScripts
        @vite(['resources/js/darkmode.js'])

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/796b904c46.js" crossorigin="anonymous"></script>

        <!-- TW Elements (clock) -->
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    </body>
</html>
