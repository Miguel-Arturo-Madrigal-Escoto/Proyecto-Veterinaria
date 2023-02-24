
@extends('layouts.main')

@section('title', 'Registro de mascotas')

@section('content')

    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4 ">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 dark:bg-slate-900 dark:border-none">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Registro de mascotas</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <form action="/mascota" method="POST">
                            @csrf
                            <x-helpers.form-field type="text" field="nombre" text="Nombre" placeholder="Ej:Solovino" />
                            
                            @php
                                $options = [];

                                $options[] = ['perro', 'Perro'];
                                $options[] = ['gato', 'Tortuga'];
                                $options[] = ['tortuga', 'Perro'];
                                $options[] = ['pez', 'Pez'];
                                $options[] = ['conejo', 'Conejo'];
                                $options[] = ['puerco', 'Puerco'];
                                $options[] = ['otro', 'Otro'];

                            @endphp
                            <x-helpers.form-select name="especie" text="Especie" :options="$options" />

                            <x-helpers.form-field type="text" field="raza" text="Raza" placeholder="Ej:Chihuahua" />

                            <x-helpers.date-picker name="fecha_nac" text="Fecha de nacimiento"   />


                            @php 
                                $radios = [];
                                /* [id, value, name, text] */
                                $radios[] = ['genero-m', 'M', 'genero','Macho'];
                                $radios[] = ['genero-h', 'H', 'genero','Hembra'];

                            @endphp
                            <x-helpers.form-radios :radios="$radios" />
                            
                            <x-helpers.form-field type="text" field="telefono" text="Telefono" placeholder="Ej:3344556677" />
                            <x-helpers.form-field type="email" field="correo" text="Correo" placeholder="Ej:miguel.dev@gmail.com" />

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
