<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-helpers.simple-form-boilerplate>
        <x-slot:title>
            Mis Mascotas
        </x-slot:title>
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        {{-- @if (Session::has('mascota_added'))
                            @php $message = "La mascota " . Session::get('mascota_added')->nombre . " ha sido registrada." @endphp
                            <x-helpers.alert type="success" header="Éxito" :message="$message" />
                        @endif

                        @if (Session::has('mascota_deleted'))
                            @php $message = "La mascota " . Session::get('mascota_deleted')->nombre . " ha sido eliminada." @endphp
                            <x-helpers.alert type="error" header="Atención" :message="$message" />
                        @endif --}}

                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Nombre</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Especie</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Raza</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Fecha de Nacimiento</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Color</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Género</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Esterilizado</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Peso</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-none">
                        @foreach ($pets as $pet)
                            <x-pet.row-pet :$pet extra="view" />
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2 ml-4">
                    {{ $pets->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </x-helpers.simple-form-boilerplate>
</x-app-layout>
