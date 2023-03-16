<x-guest-layout>
    <!-- Header -->
    <div class="flex flex-col justify-center items-center mx-3 text-justify my-4 lg:my-14">
        <h1 class="flex flex-row justify-center items-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Veterinaria <span class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">Gerudo</span></h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Somos un equipo de profesionales, enfocados en ofrecer una excelente atención y calidad para tu mejor amigo. <br />Agenda una cita con nosotros a través de nuestro sitio web.    </p>
        <a href={{ route('register') }} class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 mb-6">
            Agendar
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>

    <!-- Image Slider -->
    @php
        $images = [];
        for ($i = 1; $i <= 5; ++$i)
            // $images[] = [asset("img/vet$i.jpg"), "veterinario $i"];
            $images[] = [
                'path' => asset("img/vet$i.jpg"),
                'alt'  => "veterinario $i"
            ]
    @endphp

    <x-helpers.image-slider :$images />
</x-guest-layout>
