<x-app-layout>

    <x-helpers.simple-form-boilerplate>
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Clientes</h1>
            </div>
        </x-slot:title>
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Nombre</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Apellido</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Correo</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Género</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Teléfono</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Foto</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center"></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-none">
                        @foreach ($users as $user)
                            <x-user.row-user :$user extra="view" />
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                    <a href={{ route('pet.create') }} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-3">Añadir mascota</a>
                </div> --}}
                <div class="my-2 ml-4">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </x-helpers.simple-form-boilerplate>
</x-app-layout>