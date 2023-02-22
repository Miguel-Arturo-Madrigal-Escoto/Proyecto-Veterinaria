
@extends('clientes.layouts.main')

@section('title', 'Registro de clientes')

@section('content')
    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h1 class="font-semibold text-gray-800 text-center">Registro de clientes</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <form action="/cliente" method="POST">
                            @csrf
                            <div class="mb-6 flex flex-col justify-center m-auto mx-10">
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 self-start">Nombre(s)</label>
                                <input name="nombre" type="text" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block p-2.5" placeholder="Ej: Juan Fulanito" required>
                                @error('nombre')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
                                @enderror
                            </div>

                            <div class="mb-6 flex flex-col justify-center m-auto mx-10">
                                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 self-start">Apellido(s)</label>
                                <input name="apellido" type="text" id="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block p-2.5" placeholder="Ej: Perez Lopez" required>
                                @error('apellido')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
                                @enderror
                            </div>

                            <div class="mb-6 flex flex-col justify-center m-auto mx-10">
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 self-start">Género</label>    
                                <div class="flex items-center mb-4">
                                    <input checked id="genero-m" type="radio" value="M" name="genero" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="genero-m" class="ml-2 text-sm font-medium text-gray-90">Masculino</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="genero-f" type="radio" value="F" name="genero" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                    <label for="genero-f" class="ml-2 text-sm font-medium text-gray-900">Femenino</label>
                                </div>

                                @error('genero')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
                                @enderror
                            </div>

                            <div class="mb-6 flex flex-col justify-center m-auto mx-10">
                                <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 self-start">Telefono</label>
                                <input name="telefono" type="text" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block p-2.5" placeholder="Ej: 3344556677" required>
                                @error('telefono')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
                                @enderror
                            </div>

                            <div class="mb-6 flex flex-col justify-center m-auto mx-10">
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 self-start">Correo</label>
                                <input name="correo" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block p-2.5" placeholder="Ej: miguel.dev@gmail.com" required>
                                @error('correo')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
                                @enderror
                            </div>

                            <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                                <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection