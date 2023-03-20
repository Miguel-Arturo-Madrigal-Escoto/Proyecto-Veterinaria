<div class="relative max-w-sm mb-6 flex flex-col justify-center">
    <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $text }}</label>
    <x-color-picker
        placeholder="Selecciona un color de la paleta"
        name="color"
        value="{{$value}}"
        {{-- color-name-as-value --}}
    />
</div>
