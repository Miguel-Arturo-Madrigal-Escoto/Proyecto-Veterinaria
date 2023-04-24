<div>
    <x-slot:title>
        <div class="flex flex-row justify-center items-center">
            <h1>Vacunas de la mascota {{ $pet->name }}</h1>
        </div>
    </x-slot:title>
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Título</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Descripción</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-none">
                    @php $extra = []; @endphp
                    @foreach ($pet->vaccines as $vaccine)
                        <x-vaccine.row-vaccine :$vaccine :$extra />
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
