{{-- [id, value, name, text]  --}}

<div class="mb-6 flex flex-col justify-center m-auto mx-10">
    <label for={{ $radios[0][2] }} class="block mb-2 text-sm font-medium text-gray-900 self-start">{{ ucfirst($radios[0][2]) }}</label>    
    @foreach ($radios as $radio)
        <div class="flex items-center mb-4">
            <input id={{ $radio[0] }} type="radio" value={{ $radio[1] }} name={{ $radio[2] }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
            <label for="genero-m" class="ml-2 text-sm font-medium text-gray-90">{{ $radio[3] }}</label>
        </div>       
    @endforeach

    @error($radios[0][2])
        <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>  
    @enderror
</div>