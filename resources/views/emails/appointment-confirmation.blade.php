
<!DOCTYPE html>
<html lang="en">
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
<body>
    {{-- <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900"> --}}
    <section style=
        "padding-left: 1.5rem;
        padding-right: 1.5rem;
        padding-top: 2rem;
        padding-bottom: 2rem;
        margin-left: auto;
        margin-right: auto;
        background-color: #ffffff;
        max-width: 42rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh; "
    >
        <header style=
            "display: flex;
            flex-direction: row;
            justify-content: center;"
        >
            <img style=
                "width: 5rem;
                height: 5rem;
                border-radius: 9999px;"
            src="https://drive.google.com/uc?export=view&id=1nxfzoUij9P6DLPVJMSDkJvbCPp2XZEmw" alt="Logo de la veterinaria">
        </header>

        <main style="margin-top: 2rem;">
            <h2 style="color: #374151;">Hola {{ $appointment->user->name . ' ' . $appointment->user->lastname  }},</h2>

            <p style=
                "margin-top: 1rem;
                margin-bottom: 1rem;
                color: #4B5563;
                line-height: 2;"
            >
            @php
                $date = new DateTimeImmutable($appointment->date);
            @endphp
                Su cita para el día {{ $date->format('Y-m-d') }} a las {{ $date->format('H:i A') }} ha sido confirmada. <br />
                Los detalles se encuentran en el pdf adjunto en este correo de confirmación.
            </p>

            <p style=
                "margin-top: 2rem;
                color: #4B5563;
                line-height: 2;"
            >
                Quedamos atentos a cualquier duda y/o aclaración. <br />
                Equipo BOTW
            </p>

            {{-- <x-helpers.footer /> --}}
        </main>

    </section>
</body>
</html>
