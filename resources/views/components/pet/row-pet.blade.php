<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->name }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center flex justify-center items-center">
                <x-pet.species-pet species="{{$pet->species}}" />
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->race }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            @php
                $ok = true;
                try {
                    $dob = new DateTimeImmutable($pet->dob);

                } catch (\Throwable $th) {
                    $ok = !$ok;
                }
            @endphp
            @if($ok)
                <div class="text-center">{{ $dob->format('d-m-Y') }}</div>
            @else
                <div class="text-center">{{now()}}</div>
            @endif
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
                @if ($pet->sterilized)
                    <i class="fa-solid fa-circle-check text-green-600 fa-lg"></i>
                @else
                    <i class="fa-solid fa-circle-xmark text-red-600 fa-lg"></i>
                @endif
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $pet->weight }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center flex justify-center items-center">
                @php
                    $photo = $pet->photo;
                @endphp
                @if (!is_null($photo))
                    <img class="w-10 h-10 rounded-full" src="storage/{{$photo->hash}}" alt="Rounded avatar">
                @else
                    <img class="w-10 h-10 mb-3 rounded-full shadow-lg" src="https://upload.wikimedia.org/wikipedia/commons/0/0a/No-image-available.png" alt="Imagen de la mascota" loading="lazy" />
                @endif
            </div>
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
