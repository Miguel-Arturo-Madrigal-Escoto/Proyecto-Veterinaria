
@extends('layouts.main')

@section('title', 'Editar cliente')

@section('content')
    <!-- component -->
    <section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900">
        <div class="flex flex-col justify-center items-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-md border border-gray-20 dark:bg-slate-900">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Editar cliente</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <form action={{ route('cliente.update', $cliente) }} method="POST" class="">
                            @csrf
                            @method('PUT')
                            <x-helpers.form-field :value="$cliente->nombre" type="text" field="nombre" text="Nombre(s)" placeholder="Ej: Juan Fulanito" />
                            <x-helpers.form-field :value="$cliente->apellido" type="text" field="apellido" text="Apellido(s)" placeholder="Ej:Perez López" />
                            
                            @php 
                                $radios = [];
                                /* [id, value, name, text] */
                                $radios[] = ['genero-m', 'M', 'genero','Masculino', ($cliente->genero === 'M')? true: false];
                                $radios[] = ['genero-f', 'F', 'genero','Femenino', ($cliente->genero === 'F')? true: false];

                            @endphp
                            <x-helpers.form-radios :radios="$radios" />
                            
                            <x-helpers.form-field :value="$cliente->telefono" type="text" field="telefono" text="Telefono" placeholder="Ej:3344556677" />
                            <x-helpers.form-field :value="$cliente->correo" type="email" field="correo" text="Correo" placeholder="Ej:miguel.dev@gmail.com" />

                            <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                                <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection