<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <div class="mb-6 flex flex-col justify-center m-auto mx-10">
        <label for={{ $field }} class="block mb-2 text-sm font-medium text-gray-900 self-start">{{ $text }}</label>
        <input name={{ $field }} type={{ $type }} id={{ $field }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block p-2.5" placeholder={{ $placeholder }} required>
        @error($field)
            <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
        @enderror
    </div>
</div>