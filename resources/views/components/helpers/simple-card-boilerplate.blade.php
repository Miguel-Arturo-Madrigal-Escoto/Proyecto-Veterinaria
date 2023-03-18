<!-- component -->
<section class="antialiased bg-white text-gray-600 px-4 dark:bg-slate-900 my-14 mx-auto {{$size}}">
    <div class="flex flex-col justify-center items-center w-full">
        <!-- Table -->
        {{-- max-w-2xl --}}
        <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-20 dark:bg-slate-900 px-2">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-none">
                <h1 class="font-semibold text-gray-800 text-center dark:text-white">{{ $title }}</h1>
            </header>
            {{ $slot }}
        </div>
    </div>
</section>
