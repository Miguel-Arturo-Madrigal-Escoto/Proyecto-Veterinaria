<x-guest-layout>
    <!-- Header -->
    <div class="flex flex-col justify-center items-center mx-3 text-justify my-4 lg:my-14">
        <h1 class="flex flex-row justify-center items-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Veterinaria <span class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">BOTW</span></h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Somos un equipo de profesionales, enfocados en ofrecer una excelente atención y calidad para tu mejor amigo. <br />Agenda una cita con nosotros a través de nuestro sitio web.    </p>
        <a href={{ route('register') }} class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 mb-6">
            Agendar
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>

    <!-- Slider images -->
    @php
        $images = [];
        for ($i = 1; $i <= 5; ++$i)
            // $images[] = [asset("img/vet$i.jpg"), "veterinario $i"];
            $images[] = [
                'path' => asset("img/vet$i.jpg"),
                'alt'  => "veterinario $i"
            ]
    @endphp

    <!-- Slider -->
    <x-helpers.image-slider :$images />

    <!-- Services -->
    <div class="my-16">
        <h2 class="flex flex-row justify-center  mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">Servicios: </h2>
        <div class="flex flex-row justify-evenly items-center my-4 p-10 flex-wrap">
            <x-helpers.card-with-image image="{{asset('img/service1.jpg')}}" alt="servicio 1" title="Medicina preventiva">
                <p class="text-justify text-base my-2">
                    Contamos con excelentes programas de medicina preventiva como es la aplicación de vacunas para perros, gatos y hurones de los laboratorios más reconocidos
                    y con los distribuidores  del ramo que se han destacado por el mantenimiento de la cadena fría para que los biológicos al ser aplicados a su mascota se encuentren en perfectas condiciones.
                </p>
            </x-helpers.card-with-image>
            <x-helpers.card-with-image image="{{asset('img/service2.jpg')}}" alt="servicio 2" title="Consulta">
                <p class="text-justify text-base my-2">
                    Contamos con médicos veterinarios expertos en diferentes disciplinas y con la metodología necesaria para llegar a los diagnósticos que permitirán enfocar los tratamientos de manera eficiente
                    y oportuna, seguimos a detalle el expediente clínico orientado a problemas.
                </p>
            </x-helpers.card-with-image>
            <x-helpers.card-with-image image="{{asset('img/service3.jpg')}}" alt="servicio3" title="Cirugía">
                <p class="text-justify text-base my-2">
                    Contamos con quirófano equipado con anestesia inhalada y monitores trans quirúrgicos en donde al anestesista se le permite visualizar permanentemente las constantes de las mascotas como son
                    el electrocardiograma, frecuencia respiratoria, cantidad de oxigeno y bióxido de carbono circulante en el organismo de nuestra mascota, entre otras.
                </p>
            </x-helpers.card-with-image>
            <x-helpers.card-with-image image="{{asset('img/service4.jpg')}}" alt="servicio 4" title="Hospitalización">
                <p class="text-justify text-base my-2">
                    Contamos con las instalaciones y el personal capacitado para brindar el internamiento de pacientes con fines tanto terapéuticos como diagnostico en donde se requiere
                    la supervisión e intervención  continua (24 horas).
                </p>
            </x-helpers.card-with-image>

        </div>
    </div>

    <!-- Ubicación -->
    <div class="flex flex-wrap justify-center items-center w-full h-full my-16">
        <div class="flex flex-row justify-center items-center w-full h-full mb-4">
            <h2 class="flex flex-row justify-center items-center mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">Ubicación: </h2>
        </div>
        <div class="flex flex-row justify-center items-center w-full h-full mx-6">
            <img class="absolute left-0 w-6/12 lg:w-3/12" src="{{asset('img/dog-location.png')}}" alt="Perro en la ubicación" loading="lazy">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.1334227314032!2d-103.39678274880835!3d20.745385586084552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428af856a71382f%3A0x9f44b1e5544b0438!2sLomas%20Veterinaria!5e0!3m2!1ses-419!2smx!4v1679369888888!5m2!1ses-419!2smx"  height="500" width="100%" class="mx-6" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</x-guest-layout>
