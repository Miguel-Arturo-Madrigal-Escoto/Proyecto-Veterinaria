<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-helpers.form-field value="{{old('name')}}" type="text" field="name" text="Nombre(s)" placeholder="Ej: Juan" />

            <x-helpers.form-field value="{{old('lastname')}}" type="text" field="lastname" text="Apellido(s)" placeholder="Ej: Perez" />

            @php
                $radios = [];
                /* [id, value, name, text] */
                $radios[] = [
                    'id' => 'gender-m',
                    'value' => 'M',
                    'name' => 'gender',
                    'label' => 'Genero',
                    'text' => 'Masculino',
                    'checked' => old('gender') === 'M'
                ];
                $radios[] = [
                    'id' => 'gender-f',
                    'value' => 'F',
                    'name' => 'gender',
                    'label' => 'Genero',
                    'text' => 'Femenino',
                    'checked' => old('gender') === 'F'
                ];

            @endphp
            <x-helpers.form-radios :radios="$radios" />

            <x-helpers.form-field value="{{old('phone')}}" type="text" field="phone" text="Telefono" placeholder="Ej: 3365238190" />

            <x-helpers.form-field value="{{old('email')}}" type="email" field="email" text="Correo" placeholder="Ej: juan@dev.com" />

            <x-helpers.form-field value="{{old('password')}}" type="password" field="password" text="Contraseña" placeholder="* * * * * *" />

            <x-helpers.form-field value="{{old('password_confirmation')}}" type="password" field="password_confirmation" text="Confirma la contraseña" placeholder="* * * * * *" />

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
