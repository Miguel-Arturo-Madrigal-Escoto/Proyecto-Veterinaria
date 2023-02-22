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

    <!-- Tailwind -->
    @vite('resources/css/app.css')
</head>
<body>
    <!-- header -->

    <!-- navbar -->
    @yield('content')

    <!-- footer -->

    <!-- script -->
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
</body>
</html>