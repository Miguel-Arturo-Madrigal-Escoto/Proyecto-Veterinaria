
@extends('layouts.main')

@section('title', 'Editar mascota')

@section('content')

    <!-- component -->
    <section class="antialiased bg-gray-100 text-gray-600 px-4">
        <div class="flex flex-col justify-center items-center">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 dark:bg-slate-900 dark:border-none mt-20">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                    <h1 class="font-semibold text-gray-800 text-center dark:text-white">Registro de mascotas</h1>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <form action={{ route('mascota.update', $mascota) }} method="POST">
                            @csrf
                            @method('PUT')

                            <x-helpers.form-field :value="$mascota->nombre" type="text" field="nombre" text="Nombre" placeholder="Ej:Solovino" />

                            @php
                                $options = [];

                                $options[] = ['perro', 'Perro', ($mascota->especie === 'perro')];
                                $options[] = ['gato', 'Gato', ($mascota->especie === 'gato')];
                                $options[] = ['tortuga', 'Tortuga', ($mascota->especie === 'tortuga')];
                                $options[] = ['pez', 'Pez', ($mascota->especie === 'pez')];
                                $options[] = ['conejo', 'Conejo', ($mascota->especie === 'conejo')];
                                $options[] = ['puerco', 'Puerco', ($mascota->especie === 'puerco')];
                                $options[] = ['otro', 'Otro', ($mascota->especie === 'otro')];

                            @endphp
                            <x-helpers.form-select name="especie" text="Especie" :options="$options" />

                            <x-helpers.form-field :value="$mascota->raza" type="text" field="raza" text="Raza" placeholder="Ej:Chihuahua" />

                            <x-helpers.date-picker name="fecha_nac" text="Fecha de nacimiento" :value="$mascota->fecha_nac"  />

                            <x-helpers.color-picker  name="color" text="Color" :value="$mascota->color" />

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
                                $esterilizado[] = ['esterilizado-si', 1, 'esterilizado', 'Si', ($mascota->esterilizado)? true: false];
                                $esterilizado[] = ['esterilizado-no', 0, 'esterilizado', 'No', ($mascota->esterilizado)? false: true];

                            @endphp
                            <x-helpers.form-radios :radios="$esterilizado" />

                            <x-helpers.form-field :value="$mascota->peso" type="text" field="peso" text="Peso" placeholder="Ej:10.8" />

                            <x-helpers.form-file  :value="$mascota->foto" field="foto" text="Foto" />

                            @php $arr = [] @endphp
                            @foreach ($clientes as $cliente)
                                @php $arr[] = [$cliente->id, "$cliente->nombre $cliente->apellido: $cliente->correo", ($cliente->id == $mascota->cliente_id) ]; @endphp
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
