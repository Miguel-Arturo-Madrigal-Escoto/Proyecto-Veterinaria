@extends('clientes.layouts.main')

@section('title', 'Clientes')

@section('content')

    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 px-4">
        <div class="flex flex-col justify-center items-center h-screen">
            <!-- Table -->
            <div class=" max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 my-10 w-10/12">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h1 class="font-semibold text-gray-800 text-center">Clientes</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                @if (Session::has('user_added'))
                                    @php $message = "El cliente " . Session::get('user_added')->nombre . " " . Session::get('user_added')->apellido . " ha sido registrado." @endphp
                                    <x-helpers.alert type="success" header="Éxito" :message="$message" />                                    
                                @endif
                                                      
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Apellido</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Genero</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Teléfono</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Correo</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($clientes as $cliente)       
                                    <x-clientes.row-cliente :cliente="$cliente" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection