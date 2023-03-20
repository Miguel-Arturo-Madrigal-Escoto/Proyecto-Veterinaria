<x-app-layout>

    <x-helpers.simple-card-boilerplate size="md:w-8/12 sm:w-11/12">
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Editar mascota</h1>
            </div>
        </x-slot:title>
        <div class="md:p-14 sm:p-6">
            <div class="overflow-x-auto overflow-y-hidden">
                <form action={{route('pet.update', $pet)}} method="POST">
                    @csrf
                    @method('put')
                    <x-helpers.form-field value="{{old('name')??$pet->name}}" type="text" field="name" text="Nombre" placeholder="Ej: Solovino" />

                    @php
                        $options = [];
                        $options[] = [
                            'value'    => 'dog',
                            'text'     => 'Perro',
                            'selected' => old('species')? old('species') === 'dog' : $pet->species === 'dog'
                        ];
                        $options[] = [
                            'value'    => 'cat',
                            'text'     => 'Gato',
                            'selected' => old('species')? old('species') === 'cat' : $pet->species === 'cat'
                        ];
                        $options[] = [
                            'value'    => 'bird',
                            'text'     => 'Ave',
                            'selected' => old('species')? old('species') === 'bird' : $pet->species === 'bird'
                        ];
                        $options[] = [
                            'value'    => 'fish',
                            'text'     => 'Pez',
                            'selected' => old('species')? old('species') === 'fish' : $pet->species === 'fish'
                        ];
                        $options[] = [
                            'value'    => 'frog',
                            'text'     => 'Rana',
                            'selected' => old('species')? old('species') === 'frog' : $pet->species === 'frog'
                        ];
                        $options[] = [
                            'value'    => 'pig',
                            'text'     => 'Puerco',
                            'selected' => old('species')? old('species') === 'pig' : $pet->species === 'pig'
                        ];
                        $options[] = [
                            'value'    => 'horse',
                            'text'     => 'Caballo',
                            'selected' => old('species')? old('species') === 'horse' : $pet->species === 'horse'
                        ];
                        $options[] = [
                            'value'    => 'cow',
                            'text'     => 'Vaca',
                            'selected' => old('species')? old('species') === 'cow' : $pet->species === 'cow'
                        ];
                        $options[] = [
                            'value'    => 'other',
                            'text'     => 'Otro',
                            'selected' => old('species')? old('species') === 'other' : $pet->species === 'other'
                        ];
                    @endphp
                    <x-helpers.form-select name="species" text="Especie" :options="$options" />

                    <x-helpers.form-field value="{{old('race')??$pet->race}}" type="text" field="race" text="Raza" placeholder="Ej: Chihuahua" />

                    <x-helpers.date-picker value="{{old('dob')??$pet->dob}}" name="dob" text="Fecha de nacimiento"   />

                    <x-helpers.color-picker value="{{old('color')??$pet->color}}" name="color" text="Color" />

                    @php
                        $gender = [];
                        /* [id, value, name, text] */
                        $gender[] = [
                            'id' => 'gender-m',
                            'value' => 'M',
                            'name' => 'gender',
                            'text' => 'Macho',
                            'checked' => old('gender')? old('gender') === 'M' : $pet->gender === 'M',
                            'label'  => 'Género'
                        ];
                        $gender[] = [
                            'id' => 'gender-f',
                            'value' => 'F',
                            'name' => 'gender',
                            'text' => 'Hembra',
                            'checked' => old('gender')? old('gender') === 'F' : $pet->gender === 'F',
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
                            'checked' => old('sterilized')? old('sterilized') == '1' : $pet->sterilized == '1',
                            'label'  => 'Esterilizado'
                        ];
                        $sterilized[] = [
                            'id' => 'sterilized-no',
                            'value' => '0',
                            'name' => 'sterilized',
                            'text' => 'No',
                            'checked' => old('sterilized')? old('sterilized') == '0' : $pet->sterilized == '0',
                            'label'  => 'Esterilizado'
                        ];
                    @endphp
                    <x-helpers.form-radios :radios="$sterilized" />

                    <x-helpers.form-field value="{{old('weight')??$pet->weight}}" type="text" field="weight" text="Peso" placeholder="Ej: 10.8" />

                    <x-helpers.form-file  value="{{old('photo')}}" field="photo" text="Foto" />

                    <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </x-helpers.simple-form-boilerplate>
</x-app-layout>
