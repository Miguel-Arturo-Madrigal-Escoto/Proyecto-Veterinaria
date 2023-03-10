@extends('layouts.main')

@section('title', 'Página no encontrada')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center flex flex-col justify-center items-center">
                <figure class="max-w-lg">
                    <img class="h-auto max-w-full rounded-lg" src={{ asset('img/404-not-found.webp') }} alt="imagen del error 404" loading="lazy">
                    {{-- <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Aiuda</figcaption> --}}
                </figure>
                {{-- <h1 class="mb-4 text-5xl tracking-tight font-extrabold lg:text-5xl text-primary-600 dark:text-primary-500">Oops.</h1> --}}
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Oops.</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Lo sentimos, no pudimos encontrar lo que estas buscando. Puedes ir a la página principal a continuación:</p>
                <a href="/" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Volver al inicio</a>
            </div>
        </div>
    </section>
@endsection
