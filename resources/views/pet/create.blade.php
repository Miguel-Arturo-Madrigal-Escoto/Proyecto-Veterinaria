<x-app-layout>

    <x-helpers.simple-card-boilerplate size="md:w-8/12 sm:w-11/12">
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Añadir mascota</h1>
            </div>
        </x-slot:title>
        <div class="md:p-14 sm:p-6">
            <div class="overflow-x-auto overflow-y-hidden">
                <form action="/pet" method="POST">
                    @csrf
                    <x-helpers.form-field value="{{old('name')}}" type="text" field="name" text="Nombre" placeholder="Ej: Solovino" />

                    @php
                        $options = [];
                        $options[] = [
                            'value'    => 'dog',
                            'text'     => 'Perro',
                            'selected' => old('species') === 'dog'
                        ];
                        $options[] = [
                            'value'    => 'cat',
                            'text'     => 'Gato',
                            'selected' => old('species') === 'cat'
                        ];
                        $options[] = [
                            'value'    => 'bird',
                            'text'     => 'Ave',
                            'selected' => old('species') === 'bird'
                        ];
                        $options[] = [
                            'value'    => 'fish',
                            'text'     => 'Pez',
                            'selected' => old('species') === 'fish'
                        ];
                        $options[] = [
                            'value'    => 'frog',
                            'text'     => 'Rana',
                            'selected' => old('species') === 'frog'
                        ];
                        $options[] = [
                            'value'    => 'pig',
                            'text'     => 'Puerco',
                            'selected' => old('species') === 'pig'
                        ];
                        $options[] = [
                            'value'    => 'horse',
                            'text'     => 'Caballo',
                            'selected' => old('species') === 'horse'
                        ];
                        $options[] = [
                            'value'    => 'cow',
                            'text'     => 'Vaca',
                            'selected' => old('species') === 'cow'
                        ];
                        $options[] = [
                            'value'    => 'other',
                            'text'     => 'Otro',
                            'selected' => old('species') === 'other'
                        ];
                    @endphp
                    <x-helpers.form-select name="species" text="Especie" :options="$options" />

                    <x-helpers.form-field value="{{old('race')}}" type="text" field="race" text="Raza" placeholder="Ej: Chihuahua" />

                    <x-helpers.date-picker value="{{old('dob')??now()}}" name="dob" text="Fecha de nacimiento"   />

                    <x-helpers.color-picker colorSelected="{{old('color')??'#000000'}}" name="color" text="Color" />


                    @php
                        $gender = [];
                        /* [id, value, name, text] */
                        $gender[] = [
                            'id' => 'gender-m',
                            'value' => 'M',
                            'name' => 'gender',
                            'text' => 'Macho',
                            'checked' => old('gender') == 'M',
                            'label'  => 'Género'
                        ];
                        $gender[] = [
                            'id' => 'gender-f',
                            'value' => 'F',
                            'name' => 'gender',
                            'text' => 'Hembra',
                            'checked' => old('gender') == 'F',
                            'label'  => 'Género'
                        ];
                    @endphp
                    <x-helpers.form-radios :radios="$gender" />

                    @php
                        $sterilized = [];
                        /* [id, value, name, text] */
                        $sterilized[] = [
                            'id' => 'sterilized-yes',
                            'value' => '1',
                            'name' => 'sterilized',
                            'text' => 'Si',
                            'checked' => old('sterilized') === '1',
                            'label'  => 'Esterilizado'
                        ];
                        $sterilized[] = [
                            'id' => 'sterilized-no',
                            'value' => '0',
                            'name' => 'sterilized',
                            'text' => 'No',
                            'checked' => old('sterilized') === '0',
                            'label'  => 'Esterilizado'
                        ];
                    @endphp
                    <x-helpers.form-radios :radios="$sterilized" />

                    <x-helpers.form-field value="{{old('weight')}}" type="text" field="weight" text="Peso" placeholder="Ej: 10.8" />

                    {{-- <x-helpers.form-file  value="{{old('photo')}}" field="photo" text="Foto" /> --}}


                    @if (Auth::user()->is_admin)
                        @php $options = []; @endphp
                        @foreach($users as $user)
                            @php
                                $options[] = [
                                    'value'    => $user->id,
                                    'text'     => "$user->name - $user->email",
                                    'selected' => old('user_id') == $user->id
                                ];
                            @endphp
                        @endforeach

                        <x-helpers.form-select name="user_id" text="Cliente" :options="$options" />
                    @endif


                    <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                        <button type="submit" class="text-black dark:text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </x-helpers.simple-form-boilerplate>
</x-app-layout>
