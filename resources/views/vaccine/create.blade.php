<x-app-layout>
    <x-helpers.simple-card-boilerplate size="md:w-8/12 sm:w-11/12">
        <x-slot:title>
            <div class="flex flex-row justify-center items-center">
                <h1>Añadir vacuna</h1>
            </div>
        </x-slot:title>
        <div class="md:p-14 sm:p-6">
            <div class="overflow-x-auto overflow-y-hidden">
                <form action={{ route('vaccine.store') }} method="POST">
                    @csrf

                    <x-helpers.form-field value="{{old('title')}}" type="text" field="title" text="Título" placeholder="Ej: Vacuna Rabia" />
                    <x-helpers.form-field value="{{old('description')}}" type="text" field="description" text="Descripción" placeholder="Ej: Vacuna que protege a los animales contra la rabia" />

                    <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                        <button type="submit" class="text-white dark:text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </x-helpers.simple-form-boilerplate>
</x-app-layout>
