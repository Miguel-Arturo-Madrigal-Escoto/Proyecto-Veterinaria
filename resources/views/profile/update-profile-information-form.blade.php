<x-form-section submit="updateProfileInformation" id="update-profile-info">
    <x-slot name="title">
        {{ __('Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualice la información de perfil y la dirección de correo electrónico de su cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                {{-- <x-label for="photo" value="{{ __('Photo') }}" /> --}}

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecciona una nueva foto') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remover foto') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="{{old('name')??Auth::user()->name}}" type="text" field="name" text="Nombre(s)" placeholder="" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="{{old('lastname')??Auth::user()->lastname}}" type="text" field="lastname" text="Apellido(s)" placeholder="" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="{{old('email')??Auth::user()->email}}" type="email" field="email" text="Correo" placeholder="" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="{{old('phone')??Auth::user()->phone}}" type="text" field="phone" text="Teléfono" placeholder="" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            @php
                $gender = [];
                /* [id, value, name, text] */
                $gender[] = [
                    'id' => 'gender-m',
                    'value' => 'M',
                    'name' => 'gender',
                    'text' => 'Masculino',
                    'checked' => old('gender')? old('gender') === 'M' : Auth::user()->gender === 'M',
                    'label'  => 'Género'
                ];
                $gender[] = [
                    'id' => 'gender-f',
                    'value' => 'F',
                    'name' => 'gender',
                    'text' => 'Femenino',
                    'checked' => old('gender')? old('gender') === 'F' : Auth::user()->gender === 'F',
                    'label'  => 'Género'
                ];
            @endphp
            <x-helpers.form-radios :radios="$gender" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
