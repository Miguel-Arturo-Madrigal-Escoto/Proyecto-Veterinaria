<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            @php
                $ok = true;
                try {
                    $date = new DateTimeImmutable($appointment->date);

                } catch (\Throwable $th) {
                    $ok = !$ok;
                }
            @endphp
            @if($ok)
                <div class="text-center">{{ $date->format('d-m-Y') }}</div>
            @else
                <div class="text-center">{{now()}}</div>
            @endif
        </td>
        <td class="p-2 whitespace-nowrap" >
            <div class="text-center">
                @if ($appointment->status == 0)
                    Pendiente
                @elseif ($appointment->status == 1)
                    Confirmada
                @else
                    Rechazada
                @endif
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">${{ $appointment->cost }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">
                @if ($appointment->paid)
                    <i class="fa-solid fa-circle-check text-green-600 fa-lg"></i>
                @else
                    <i class="fa-solid fa-circle-xmark text-red-600 fa-lg"></i>
                @endif
            </div>
        </td>

        @can('show-appointment', $appointment)
            @if ($extra === 'view')
                <td class="p-2 whitespace-nowrap">
                    <a href={{ route('appointment.show', $appointment) }}>
                        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                    </a>
                </td>
            @endif
        @endcan

        @can('edit-appointment', $appointment)
            @if ($extra === 'edit')
                <td class="p-2 whitespace-nowrap">
                    <a href={{ route('appointment.edit', $appointment) }}>
                        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                    </a>
                </td>
            @endif
        @endcan
    </tr>
</div>
