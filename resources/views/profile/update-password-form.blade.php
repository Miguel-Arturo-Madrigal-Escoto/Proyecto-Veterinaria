<x-form-section submit="updatePassword" id="update-profile-password">
    <x-slot name="title">
        {{ __('Actualizar contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="" type="password" field="current_password" text="Contraseña actual" placeholder="" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="" type="password" field="password" text="Nueva contraseña" placeholder="" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-helpers.form-field value="" type="password" field="password_confirmation" text="Confirma la nueva contraseña" placeholder="" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button>
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
