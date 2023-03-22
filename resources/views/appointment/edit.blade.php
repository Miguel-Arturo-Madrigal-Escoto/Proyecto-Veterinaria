<x-app-layout>

    <x-helpers.simple-card-boilerplate size="md:w-8/12 sm:w-11/12">
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Editar cita</h1>
            </div>
        </x-slot:title>
        <div class="md:p-14 sm:p-6">
            <div class="overflow-x-auto overflow-y-hidden">
                <form action={{route('appointment.update', $appointment)}} method="POST">
                    @csrf
                    @method('put')

                    <x-helpers.date-picker value="{{old('date')??$appointment->date}}" name="date" text="Fecha"   />

                    <x-helpers.form-textarea field="reason" text="Motivo" value="{{old('reason')??$appointment->reason}}" />

                    @foreach ($pets as $pet)
                        @php
                            $options[] = [
                                'value'    => $pet->id,
                                'text'     => $pet->name,
                                'selected' => old('pet_id')? old('pet_id') == old('pet_id') : $appointment->pet_id == $pet->id
                            ];
                        @endphp
                    @endforeach

                    <x-helpers.form-select name="pet_id" text="Mascota" :$options />

                    <div class="mb-6 mt-12 flex flex-col justify-center m-auto w-1/3">
                        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </x-helpers.simple-form-boilerplate>
</x-app-layout>
