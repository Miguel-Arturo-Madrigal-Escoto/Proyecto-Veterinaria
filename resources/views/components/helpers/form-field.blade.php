<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <div class="mb-2 flex flex-col justify-center m-auto ">
        <label for="{{$field}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $text }}</label>
        <input name="{{$field}}" type="{{$type}}" id="{{$field}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$placeholder}}" required value="{{$value}}"  wire:model.defer="state.{{$field}}">
        @if(Request::segment(1) !== 'login')
            @error($field)
                <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        @endif
    </div>
</div>
