<div class="relative max-w-sm mb-4 flex flex-col justify-center">
    <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $text }}</label>
    <div class="absolute inset-y-12 left-0 flex items-center pl-3 pointer-events-none">
      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
    </div>
    <input name="{{$name}}" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecciona una fecha" value={{ ($value !== " ")? $value->format('m-d-Y') : $value }}>
    @error($name)
        <p id="filled_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>
    @enderror
    <!--Date Picker JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
</div>
