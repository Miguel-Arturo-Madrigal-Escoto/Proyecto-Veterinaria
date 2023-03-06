@extends('layouts.main')

@section('title', 'Clientes')

@vite('resources/css/pagination.css')

@section('content')

    <!-- component -->
    <section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900">
        <div class="flex flex-col justify-center items-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg border border-gray-200 dark:bg-slate-900 px-2">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Clientes</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                @if (Session::has('user_added'))
                                    @php $message = "El cliente " . Session::get('user_added')->nombre . " " . Session::get('user_added')->apellido . " ha sido registrado." @endphp
                                    <x-helpers.alert type="success" header="Éxito" :message="$message" />
                                @endif

                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-centerp">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Apellido</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Genero</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Teléfono</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Correo</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100 dark:divide-none">
                                @foreach ($clientes as $cliente)
                                    <x-clientes.row-cliente :cliente="$cliente" extra="view" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                    <a href="/cliente/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-3">Registrar cliente</a>
                </div>

                <!-- Paginación -->
                <div class="pagination mb-6 flex flex-col w-full justify-center items-center">
                    {{ $clientes->links('pagination::tailwind')  }}
                </div>
            </div>
        </div>
    </section>
@endsection
