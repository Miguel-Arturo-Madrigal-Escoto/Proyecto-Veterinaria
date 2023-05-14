<div>
    @php
        $appointments_count = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0
        ]
    @endphp

    @foreach ($appointments as $appointment)
        @php  $appointments_count[$appointment['status']]++;    @endphp
    @endforeach

    <div class="flex flex-col justify-center items-center mx-3  my-4 lg:my-14">
        <h1 class="flex flex-row justify-between items-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">Bienvenido: {{ Auth::user()->name . ' ' . Auth::user()->lastname }}</h1>
    </div>

    <div class="flex flex-row justify-evenly items-center my-4 p-10 flex-wrap">
        <x-helpers.card-with-image title="Mascotas" image="{{asset('img/pet-card.jpg')}}" alt="imagen de mis mascotas">
            <p class="text-justify text-base my-2">
                A continuación se muestra la cantidad de mascotas que estan registradas en
                la clinica:
            </p>
            <div class="flex flex-col">
                @foreach ($pets as $pet => $count)
                    @if($count > 0)
                        <div class="flex flex-row">
                            <x-pet.species-pet species="{{$pet}}" />
                            <span> : {{$count}}</span>
                        </div>
                    @endif
                @endforeach
                <div class="my-6 flex flex-col justify-center m-auto w-2/3">
                    <a href="{{route('pet.create')}}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Añadir mascota</a>
                </div>
            </div>
        </x-helpers.card-with-image>

        <x-helpers.card-with-image title="Clientes" image="{{asset('img/pet-client.jpg')}}" alt="imagen de mis mascotas">
            <p class="text-justify text-base my-2">
                A continuación se muestran la cantidad de clientes que se encuentran
                registrados en la clínica:
            </p>
            <div class="flex flex-col">
                <div class="flex flex-row">
                    {{-- <span>{{$count}}&nbsp;</span> --}}
                    <span><b><i class="fa-solid fa-users"></i></b> {{sizeof($clients)}}</span>
                </div>

                <div class="my-6 flex flex-col justify-center m-auto w-2/3">
                    <a href="{{route('user.index')}}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ver clientes</a>
                </div>
            </div>
        </x-helpers.card-with-image>

        <x-helpers.card-with-image title="Citas" image="{{asset('img/pet-appointment.jpg')}}" alt="imagen de mis mascotas">
            <p class="text-justify text-base my-2">
                A continuación se muestran la cantidad de citas que se encuentran registradas en
                la clinica:
            </p>
            <div class="flex flex-col">
                @foreach ($appointments_count as $appointment => $count)
                    <div class="flex flex-row">
                        {{-- <span>{{$count}}&nbsp;</span> --}}
                        @if ($appointment === 0)
                            <span><b>Pendiente:</b> {{$count}}</span>
                        @elseif ($appointment === 1)
                            <span><b>Confirmada:</b> {{$count}}</span>
                        @else
                            <span><b>Rechazada:</b> {{$count}}</span>
                        @endif
                    </div>
                @endforeach
                <div class="my-6 flex flex-col justify-center m-auto w-2/3">
                    <a href="{{route('appointment.create')}}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Agendar cita</a>
                </div>
            </div>
        </x-helpers.card-with-image>
    </div>

    <div class="flex flex-col justify-center items-center mx-3  my-4 lg:my-14">
        <h2 class="flex flex-row justify-center items-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">Próximos eventos</h2>
    </div>

    <x-helpers.calendar :$appointments />
</div>
