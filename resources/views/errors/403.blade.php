@can ('show-errors-as-authenticated')
    <x-app-layout>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center flex flex-col justify-center items-center">
                    <figure class="max-w-lg">
                        <img class="h-auto max-w-full rounded-lg my-6" src={{ asset('img/403-forbidden.png') }} alt="imagen del error 404" loading="lazy">
                        {{-- <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Aiuda</figcaption> --}}
                    </figure>
                    {{-- <h1 class="mb-4 text-5xl tracking-tight font-extrabold lg:text-5xl text-primary-600 dark:text-primary-500">Oops.</h1> --}}
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">403 - Forbidden</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Lo sentimos, no pudimos acceder al contenido que estas buscando. Puedes ir a la página principal a continuación:</p>
                    <a href={{ route('dashboard') }} class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 mb-6">
                        Volver al inicio
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </section>
    </x-app-layout>
@else
    <x-guest-layout>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center flex flex-col justify-center items-center">
                    <figure class="max-w-lg">
                        <img class="h-auto max-w-full rounded-lg my-6" src={{ asset('img/403-forbidden.png') }} alt="imagen del error 404" loading="lazy">
                        {{-- <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Aiuda</figcaption> --}}
                    </figure>
                    {{-- <h1 class="mb-4 text-5xl tracking-tight font-extrabold lg:text-5xl text-primary-600 dark:text-primary-500">Oops.</h1> --}}
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">403 - Forbidden</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Lo sentimos, no pudimos acceder al contenido que estas buscando. Puedes ir a la página principal a continuación:</p>
                    <a href={{ url('/') }} class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 mb-6">
                        Volver al inicio
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </section>
    </x-guest-layout>
@endif

