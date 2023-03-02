

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- favicon -->

    <!-- BladeUI -->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

    <!-- CDN FlowBite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- WireUI (Libreria + ColorPicker) -->
    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>


</head>
<body class="bg-white dark:bg-slate-900">
    @include('sweetalert::alert')
    <!-- header -->



    <!-- navbar -->
    @php
        $elements    = [];
        $elements[]  = ['Inicio',     '/',        []];
        $elements[]  = ['Clientes',   '/cliente', [['/', 'Listado'],['/create', 'Registrar']]];
        $elements[]  = ['Mascotas',   '/mascota', [['/', 'Listado'],['/create', 'Registrar']]];
    @endphp

    <x-helpers.navbar :elements="$elements" />

    <!-- content -->
    @yield('content')

    <!-- footer -->

    <!-- script -->
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <!-- DatePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>

    <!-- Toggle Dark/Light mode -->
    @vite('resources/js/dark-mode.js')
    {{-- @vite('resources/js/window-reload.js'); --}}
</body>
</html>
