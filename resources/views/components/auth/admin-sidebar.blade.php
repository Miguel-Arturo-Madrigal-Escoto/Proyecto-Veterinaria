
<aside id="sidebar"
class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width"
aria-label="Sidebar"
x-show="!hidden"
>
<div
    class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto ">
        <div
            class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <ul class="pb-2 space-y-2 ">

                <x-helpers.sidebar-item text="Dashboard" path="{{ route('dashboard') }}" >
                    <i class="fa-solid fa-chart-pie fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item>

                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Consultar',
                        'path' => route('pet.index'),
                    ];
                    $submenu[] = [
                        'text' => 'Añadir',
                        'path' => route('pet.create'),
                    ];
                @endphp
                <x-helpers.sidebar-item-with-submenu text="Mascotas" :$submenu>
                    <i class="fa-solid fa-shield-dog fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>

                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Consultar',
                        'path' => route('appointment.index'),
                    ];
                    $submenu[] = [
                        'text' => 'Agendar',
                        'path' => route('appointment.create'),
                    ];
                @endphp
                <x-helpers.sidebar-item-with-submenu text="Citas" :$submenu>
                    <i class="fa-solid fa-calendar fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>


                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Consultar',
                        'path' => route('user.index'),
                    ];
                    // $submenu[] = [
                    //     'text' => 'Registrar',
                    //     'path' => '#',
                    // ];
                @endphp
                <x-helpers.sidebar-item-with-submenu text="Clientes" :$submenu>
                    <i class="fa-solid fa-users fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>


                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Consultar',
                        'path' => route('vaccine.index'),
                    ];
                    $submenu[] = [
                        'text' => 'Añadir',
                        'path' => route('vaccine.create'),
                    ];
                    $submenu[] = [
                        'text' => 'Aplicar',
                        'path' => route('apply-vaccine.index'),
                    ];
                    $submenu[] = [
                        'text' => 'Historial',
                        'path' => route('applied-vaccines.index'),
                    ];
                @endphp

                <x-helpers.sidebar-item-with-submenu text="Vacunas" :$submenu>
                    <i class="fa-solid fa-syringe fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>


                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Actualizar perfil',
                        'path' => '/user/profile/#update-profile-info',
                    ];
                @endphp
                <x-helpers.sidebar-item-with-submenu text="Ajustes" :$submenu>
                    <i class="fa-solid fa-user fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>


                @php
                    $submenu = [];
                    $submenu[] = [
                        'text' => 'Cambiar contraseña',
                        'path' => '/user/profile/#update-profile-password',
                    ];
                    $submenu[] = [
                        'text' => 'Autenticación de dos factores',
                        'path' => '/user/profile/#two-factor-auth',
                    ];
                    $submenu[] = [
                        'text' => 'Cerrar sesiones abiertas',
                        'path' => '/user/profile/#logout-other-browser-session',
                    ];
                    $submenu[] = [
                        'text' => 'Eliminar cuenta',
                        'path' => '/user/profile/#delete-account',
                    ];
                @endphp
                <x-helpers.sidebar-item-with-submenu text="Seguridad" :$submenu>
                    <i class="fa-solid fa-lock fa-lg text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"></i>
                </x-helpers.sidebar-item-with-submenu>



            </ul>
        </div>
    </div>
</div>
</aside>



