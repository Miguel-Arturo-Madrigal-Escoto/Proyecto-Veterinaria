<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">    
            <div class="text-left">{{ $cliente->nombre }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $cliente->apellido }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">
                @if ($cliente->genero == 'M')
                    Masculino
                @else
                    Femenino
                @endif
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $cliente->telefono }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ $cliente->correo }}</div>
        </td>
        @if ($extra === 'view')
            <a>
                <td class="p-2 whitespace-nowrap">
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                </td>
            </a>
        @endif

        @if ($extra === 'edit')
            <a>
                <td class="p-2 whitespace-nowrap">
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                </td>
            </a>
        @endif
    </tr>
</div>