
@extends('layouts.main')

@section('title', $cliente->nombre . ' ' . $cliente->apellido)

@section('content')
    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 px-4">
        <div class="flex flex-col justify-center items-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-md dark:bg-slate-900 border-none flex flex-col justify-center items-center">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Datos del cliente</h1>
                </header>

                <div class="w-full max-w-sm bg-white rounded-lg dark:bg-slate-900 dark:border-slate-700 border-none">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Abrir</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href={{ route('cliente.edit', $cliente) }} class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="Imagen del cliente" loading="lazy" />
                        <h5 class="my-5 text-xl font-medium text-gray-900 dark:text-white">{{ $cliente->nombre }} {{ $cliente->apellido }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Género: </b>{{ ($cliente->genero === 'M')? 'Masculino': 'Femenino' }}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Teléfono: </b>{{ $cliente->telefono }}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-300 py-2"><b>Correo: </b>{{ $cliente->correo }}</span>
                    </div>
                    @if (Session::has('user_updated'))
                        @php $message = "El cliente " . Session::get('user_updated')->nombre . " " . Session::get('user_updated')->apellido . " ha sido actualizado." @endphp
                        {{-- @php Session::pull('user_updated')  @endphp --}}
                        <x-helpers.alert type="info" header="Atención" :message="$message" />
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
