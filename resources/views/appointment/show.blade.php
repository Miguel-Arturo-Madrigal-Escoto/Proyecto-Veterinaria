<x-app-layout>

    <x-helpers.simple-card-boilerplate size="md:w-5/12 sm:w-11/12">
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Datos de la cita</h1>
            </div>
        </x-slot:title>
        <div class="w-full max-w-sm bg-white rounded-lg dark:bg-slate-900 dark:border-slate-700 border-none mx-auto bg-red">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Abrir</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href={{ route('appointment.edit', $appointment) }} class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar</a>
                        </li>
                        <form action={{ route('appointment.destroy', $appointment)  }} method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cancelar cita</button>
                        </form>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-start pb-10">
                @php $date = new DateTimeImmutable($appointment->date); @endphp
                <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Fecha: </b>{{ $date->format('d-m-Y') }}</span>
                <p class="text-sm text-gray-500 dark:text-gray-300 py-2 break-all"><b>Motivo: </b>{{ $appointment->reason }}</p>
                <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Costo: </b>${{ $appointment->cost }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Estatus: </b>
                    @if ($appointment->status == 0)
                        Pendiente
                    @elseif ($appointment->status == 1)
                        Confirmada
                    @else
                        Rechazada
                    @endif
                </span>
                <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Pagado: </b>
                    @if ($appointment->paid)
                        <i class="fa-solid fa-circle-check text-green-600 fa-lg"></i>
                    @else
                        <i class="fa-solid fa-circle-xmark text-red-600 fa-lg"></i>
                    @endif
                </span>
                <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Mascota: </b>{{ $pet->name }}</span>

            </div>
        </div>
    </x-helpers.simple-form-boilerplate>
</x-app-layout>
