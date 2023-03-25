<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $user->name }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $user->lastname }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $user->email }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">
                @if ($user->gender === 'M')
                    <i class="fa-solid fa-person text-blue-600 fa-lg"></i>
                @else
                    <i class="fa-solid fa-person-dress text-pink-600 fa-lg"></i>
                @endif
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $user->phone }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">
                <img class="w-10 h-10 rounded-full" src="{{$user->profile_photo_url}}" alt="Imágen del usuario" loading="lazy">
            </div>
        </td>
        @if ($extra === 'view')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('user.show', $user) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                </a>
            </td>
        @endif

        @if ($extra === 'edit')
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('pet.edit', $user) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                </a>
            </td>
        @endif
    </tr>
</div>
