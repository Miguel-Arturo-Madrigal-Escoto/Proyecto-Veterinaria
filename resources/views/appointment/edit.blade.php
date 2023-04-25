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

                        @if(Auth::user()->is_admin)

                            <x-helpers.form-field value="{{old('cost')??$appointment->cost}}" type="text" field="cost" text="Costo" placeholder="" />

                                @php
                                $options = [];

                                $options[] = [
                                    'value'    => 0,
                                    'text'     => 'Pendiente',
                                    'selected' => old('status')? old('status') == 0 : $appointment->status == 0
                                ];
                                $options[] = [
                                    'value'    => 1,
                                    'text'     => 'Confirmada',
                                    'selected' => old('status')? old('status') == 1 : $appointment->status == 1
                                ];
                                $options[] = [
                                    'value'    => 2,
                                    'text'     => 'Rechazada',
                                    'selected' => old('status')? old('status') == 2 : $appointment->status == 2
                                ];

                            @endphp
                            <x-helpers.form-select name="status" text="Estatus" :options="$options" />

                            @php
                            $paid = [];
                            /* [id, value, name, text] */
                            $paid[] = [
                                'id' => 'paid-y',
                                'value' => 1,
                                'name' => 'paid',
                                'text' => 'Si',
                                'checked' => old('paid')? old('paid') == 1 : $appointment->paid == 1,
                                'label'  => 'Pagado'
                            ];
                            $paid[] = [
                                'id' => 'paid-n',
                                'value' => 0,
                                'name' => 'paid',
                                'text' => 'No',
                                'checked' => old('paid')? old('paid') == 0 : $appointment->paid == 0,
                                'label'  => 'Pagado'
                            ];
                        @endphp
                        <x-helpers.form-radios :radios="$paid" />

                        @else
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

                        @endif

                        <div class="mb-6 mt-12 flex flex-col justify-center m-auto w-1/3">
                            <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </x-helpers.simple-form-boilerplate>
</x-app-layout>
