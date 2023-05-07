<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <tr class="font-semibold  text-gray-500 dark:text-gray-300">
        <td class="p-2 whitespace-nowrap">
            <div class="text-center">{{ $vaccine->title }}</div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-justify break-normal">{{ $vaccine->description }}</div>
        </td>

        @if (in_array('view', $extra))
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('vaccine.show', $vaccine) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Ver</button>
                </a>
            </td>
        @endif

        @if (in_array('edit', $extra))
            <td class="p-2 whitespace-nowrap">
                <a href={{ route('vaccine.edit', $vaccine) }}>
                    <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 border-none">Editar</button>
                </a>
            </td>
        @endif

        @if (in_array('delete', $extra))
            <form id="form-delete-{{$vaccine->id}}" action={{ route('vaccine.destroy', $vaccine) }} method="POST">
                @csrf
                @method('DELETE')
                <td class="p-2 whitespace-nowrap">
                    <button onclick="onFormSubmit('form-delete-{{$vaccine->id}}')" type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                </td>
            </form>
        @endif
    </tr>
    <script>
        function onFormSubmit(id) {
            const formDelete = document.getElementById(id);

            formDelete.addEventListener('submit', (e) => {
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Este proceso no es reversible',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) formDelete.submit();
                })

            })

        }
    </script>
</div>
