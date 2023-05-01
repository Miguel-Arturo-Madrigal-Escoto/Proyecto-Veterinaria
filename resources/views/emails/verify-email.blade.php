
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
            <h2 style="color: #374151;">Hola,</h2>

            <p style=
                "margin-top: 1rem;
                margin-bottom: 1rem;
                color: #4B5563;
                line-height: 2;"
            >
                Por favor, haga clic en el botón de abajo para verificar su dirección de correo electrónico de <span class="font-semibold ">Veterinaria BOTW</span>.
            </p>


            <a href="{{$url}}" style=
                "padding-top: 0.625rem;
                padding-bottom: 0.625rem;
                padding-left: 1.25rem;
                padding-right: 1.25rem;
                margin-right: 0.5rem;
                margin-bottom: 0.5rem;
                background-color: #1D4ED8;
                color: #ffffff;
                font-size: 0.875rem;
                line-height: 1.25rem;
                font-weight: 500;
                border-radius: 0.5rem;
                text-decoration: none"
            >
                Verificar cuenta
            </a>



            <p style=
                "margin-top: 2rem;
                color: #4B5563;
                line-height: 2;"
            >
                Si tiene problemas para hacer clic en el botón "Verificar cuenta",
                copie y pegue la siguiente URL en su navegador web: {{$url}}
            </p>

            <p style=
                "margin-top: 2rem;
                margin-bottom: 2rem;
                color: #4B5563;"
            >
                Gracias, <br>
                Equipo <b>Veterinaria BOTW</b>
            </p>
            {{-- <x-helpers.footer /> --}}
        </main>


    </section>
</body>
</html>
