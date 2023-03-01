<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $mascota->nombre }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $mascota->especie }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $mascota->raza }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            @php $dob = new DateTimeImmutable($mascota->fecha_nac); @endphp
            <div class="text-left">{{ $dob->format('d-m-Y') }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $mascota->color }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">
                {{ ($mascota->genero == 'M')? 'Macho': 'Hembra' }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">
                {{ ($mascota->esterilizado)? 'Si': 'No' }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $mascota->peso }}</div>
        </td>
        @if ($extra === 'view')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('mascota.show', $mascota) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                </a>
            </td>
        @endif

        @if ($extra === 'edit')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('mascota.edit', $mascota) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                </a>
            </td>
        @endif
    </tr>
</div>
