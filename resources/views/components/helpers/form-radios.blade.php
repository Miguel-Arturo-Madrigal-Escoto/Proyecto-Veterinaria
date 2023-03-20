{{-- [id, value, name, text, checked:boolean]  --}}
{{--
    $array = []
    $array[] = [
        'id' => ...,
        'value' => ...,
        'name' => ...,
        'text' => ...,
        'checked' => ...
    ];
    --}}

    <div class="mb-6 flex flex-col justify-center">
        <label for="{{$radios[0]['name']}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $radios[0]['label'] }}</label>
        @foreach ($radios as $radio)
            <div class="flex items-center mb-4">
                @if ($radio['checked'])
                    <input checked id="{{$radio['id']}}" type="radio" value="{{$radio['value']}}" name="{{$radio['name']}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                @else
                    <input id="{{$radio['id']}}" type="radio" value="{{$radio['value']}}" name="{{$radio['name']}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                @endif
                <label for="genero-m" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $radio['text'] }}</label>
            </div>
        @endforeach

        @error($radios[0]['name'])
            <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>
        @enderror
    </div>
