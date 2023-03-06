@extends('layouts.main')

@section('title', 'Mascotas')

@vite('resources/css/pagination.css')

@section('content')

    <!-- component -->
    <section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900">
        <div class="flex flex-col justify-center items-center w-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-20 dark:bg-slate-900 px-2">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Mascotas</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                @if (Session::has('mascota_added'))
                                    @php $message = "La mascota " . Session::get('mascota_added')->nombre . " ha sido registrada." @endphp
                                    <x-helpers.alert type="success" header="Éxito" :message="$message" />
                                @endif

                                @if (Session::has('mascota_deleted'))
                                    @php $message = "La mascota " . Session::get('mascota_deleted')->nombre . " ha sido eliminada." @endphp
                                    <x-helpers.alert type="error" header="Atención" :message="$message" />
                                @endif

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
                                @foreach ($mascotas as $mascota)
                                    <x-mascotas.row-mascota :mascota="$mascota" extra="view" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                    <a href={{ route('mascota.create') }} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-3">Registrar mascota</a>
                </div>

                <!-- Paginación -->
                <div class="pagination mb-6 flex flex-col w-full justify-center items-center">
                    {{ $mascotas->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </section>
@endsection
