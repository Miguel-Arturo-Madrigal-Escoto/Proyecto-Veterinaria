<x-app-layout>

    <x-helpers.simple-form-boilerplate>
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Mis Citas</h1>
            </div>
        </x-slot:title>
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Fecha</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Estatus</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Costo</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Pagado</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-none">
                        @foreach ($appointments as $appointment)
                            <x-appointment.row-appointment :$appointment extra="view" />
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-6 mt-4 flex flex-col justify-center m-auto w-1/3">
                    <a href={{ route('appointment.create') }} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-3">Nueva cita</a>
                </div>
                <div class="my-2 ml-4">
                    {{ $appointments->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </x-helpers.simple-form-boilerplate>
</x-app-layout>
