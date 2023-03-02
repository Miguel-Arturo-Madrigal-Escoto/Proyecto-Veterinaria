
@extends('layouts.main')

@section('title', 'Registro de mascotas')

@section('content')

    <!-- component -->
    <section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900">
        <div class="flex flex-col justify-center items-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg border border-gray-200 dark:bg-slate-900 mt-20">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Registro de mascotas</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <form action="/mascota" method="POST">
                            @csrf
                            <x-helpers.form-field value="" type="text" field="nombre" text="Nombre" placeholder="Ej: Solovino" />

                            @php
                                $options = [];

                                $options[] = ['perro', 'Perro', false];
                                $options[] = ['gato', 'Gato', false];
                                $options[] = ['tortuga', 'Tortuga', false];
                                $options[] = ['pez', 'Pez', false];
                                $options[] = ['conejo', 'Conejo', false];
                                $options[] = ['puerco', 'Puerco', false];
                                $options[] = ['otro', 'Otro', false];

                            @endphp
                            <x-helpers.form-select name="especie" text="Especie" :options="$options" />

                            <x-helpers.form-field value="" type="text" field="raza" text="Raza" placeholder="Ej: Chihuahua" />

                            <x-helpers.date-picker value="" name="fecha_nac" text="Fecha de nacimiento"   />

                            <x-helpers.color-picker value="" name="color" text="Color" />

                            @php
                                $genero = [];
                                /* [id, value, name, text] */
                                $genero[] = ['genero-m', 'M', 'genero','Macho', true];
                                $genero[] = ['genero-h', 'H', 'genero','Hembra', false];

                            @endphp
                            <x-helpers.form-radios :radios="$genero" />

                            @php
                                $esterilizado = [];
                                /* [id, value, name, text] */
                                $esterilizado[] = ['esterilizado-si', 1, 'esterilizado', 'Si', true];
                                $esterilizado[] = ['esterilizado-no', 0, 'esterilizado', 'No', false];

                            @endphp
                            <x-helpers.form-radios :radios="$esterilizado" />

                            <x-helpers.form-field value="" type="text" field="peso" text="Peso" placeholder="Ej: 10.8" />

                            <x-helpers.form-file  value="" field="foto" text="Foto" />
                            @php $arr = [] @endphp
                            @foreach ($clientes as $cliente)
                                @php $arr[] = [$cliente->id, "$cliente->nombre $cliente->apellido: $cliente->correo", false]; @endphp
                            @endforeach

                            <x-helpers.form-select name="cliente_id" text="Dueño" :options="$arr" />



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
