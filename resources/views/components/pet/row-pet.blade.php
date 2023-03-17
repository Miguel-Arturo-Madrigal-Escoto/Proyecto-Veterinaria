<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->name }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center flex justify-center items-center">
                <x-pet.race-pet species="{{$pet->species}}" />
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->race }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            @php $dob = new DateTimeImmutable($pet->dob); @endphp
            <div class="text-center">{{ $dob->format('d-m-Y') }}</div>
        </td>
        <td class="p-2 whitespace-nowrap" >
            <div class="text-center text-transparent mx-auto" style="background-color:{{$pet->color}};border-radius: 10%; padding: .5rem; width: 50%">
                {{ $pet->color }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">
                {{ ($pet->gender == 'M')? 'Macho': 'Hembra' }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">
                {{ ($pet->sterilized)? 'Si': 'No' }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->weight }}</div>
        </td>
        @if ($extra === 'view')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('pet.show', $pet) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                </a>
            </td>
        @endif

        @if ($extra === 'edit')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('pet.edit', $pet) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                </a>
            </td>
        @endif
    </tr>
</div>
