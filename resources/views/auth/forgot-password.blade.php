<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img class="w-20 h-20 rounded-full" src="{{asset('img/logo.PNG')}}" alt="Rounded avatar">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-justify">
            {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-helpers.form-field type="email" field="email" text="" placeholder="ej: miguel@gmail.com" value="{{old('email')}}"/>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Restablecer contraseña') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
