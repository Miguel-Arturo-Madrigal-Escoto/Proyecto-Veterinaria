<div class="sans-serif flex">
    <div x-data="app()" x-cloak>
        <div class="max-w-sm mx-auto mb-4">
            <div>
                <div class="flex items-start">
                    <div>
                        <label for="colorSelected" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white self-start">{{ $text }}</label>
                        <input id="colorSelected" type="text" placeholder="Pick a color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            readonly
                            x-model="colorSelected"
                            name="{{$name}}"
                        >
                    </div>

                    <div class="relative ml-3 mt-8">
                        <button type="button" @click="isOpen = !isOpen"
                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: ${colorSelected}; color: white`"
                        >
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                            <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                <div class="flex flex-wrap -mx-2">
                                <template x-for="(color, index) in colors" :key="index">
                                    <div
                                        class="px-2"
                                    >
                                        <template x-if="colorSelected === color">
                                            <div
                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                                :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"
                                            ></div>
                                        </template>

                                        <template x-if="colorSelected != color">
                                            <div
                                                @click="colorSelected = color"
                                                @keydown.enter="colorSelected = color"
                                                role="checkbox"
                                                tabindex="0"
                                                :aria-checked="colorSelected"
                                                class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                                :style="`background: ${color};`"
                                            ></div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @error($name)
                <p id="filled_error_help" class="mb-2 text-xs text-red-600"><span class="font-medium">{{ $message }}</span></p>
            @enderror
        </div>
    </div>

    <script>
        function app() {
            return {
                isOpen: false,
                colors: [
                    '#89CFF0', '#00A36C', '#FEFEFE', '#7393B3', '#0096FF', '#C19A6B',
                    '#EE4B2B', '#141414', '#FFBF00', '#FFEA00', '#93C572'
                ],
                colorSelected: "{{$colorSelected}}"
            }
        }
    </script>
</div>
