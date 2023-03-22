<div>
    <div class="flex flex-col justify-center items-center mx-3  my-4 lg:my-14">
        <h1 class="flex flex-row justify-center items-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-4xl dark:text-white">Bienvenido: {{ Auth::user()->name }}</h1>
    </div>
    <x-helpers.calendar :$appointments />
</div>
