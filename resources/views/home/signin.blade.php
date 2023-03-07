@extends('layouts.vet-guest')

@section('title', 'Iniciar sesión')

@section('content')
<!-- component -->
<section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900">
    <div class="flex flex-col justify-center items-center">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg border border-gray-20 dark:bg-slate-900">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                <h1 class="font-semibold text-gray-800 text-center dark:text-white">Formulario de ingreso</h1>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <form action="/signin" method="POST" class="">
                        @csrf
                        <x-helpers.form-field value="{{old('correo')}}" type="email" field="correo" text="Correo" placeholder="Ej: miguel.dev@gmail.com" />
                        <x-helpers.form-field value="{{old('password')}}" type="password" field="password" text="Contraseña" placeholder="* * * * * *" />

                        <div class="mb-6 flex flex-col justify-center m-auto w-1/3">
                            <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-non font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
