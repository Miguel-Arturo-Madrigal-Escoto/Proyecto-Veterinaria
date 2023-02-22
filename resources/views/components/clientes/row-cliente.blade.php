<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr>
        <td class="p-2 whitespace-nowrap">    
            <div class="font-medium text-gray-800">{{ $cliente->nombre }}</div>
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
    </tr>
</div>