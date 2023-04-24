{{--
    $options[] = [
        'value'    => ...,
        'text'     => ...,
        'selected' => boolean
    ];
--}}


<div class="relative max-w-sm mb-4 flex flex-col justify-center">
    <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $text }}</label>
    <select multiple id="{{$name}}" name="{{$name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($options as $option)
            @if ($option['selected'])
                <option selected value="{{$option['value']}}">{{ $option['text'] }}</option>
            @else
                <option value="{{$option['value']}}">{{ $option['text'] }}</option>
            @endif
        @endforeach
    </select>
    @error($name)
        <p id="filled_error_help" class="mb-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>
    @enderror
</div>
