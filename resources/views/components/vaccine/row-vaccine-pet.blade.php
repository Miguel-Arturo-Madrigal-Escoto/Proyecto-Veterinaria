<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $vaccine->title }}</div>
        </td>
        @php
            $date = new DateTimeImmutable($vaccine->pivot->date);
        @endphp
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $date->format('d-m-Y') }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $date->format('H:i A') }}</div>
        </td>

    </tr>
</div>
