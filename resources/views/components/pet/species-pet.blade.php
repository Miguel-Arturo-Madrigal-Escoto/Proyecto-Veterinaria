<div>
    @switch($species)
        @case('dog')
            <i class="fa-solid fa-dog text-amber-900"></i>
            @break

        @case('cat')
            <i class="fa-solid fa-cat text-slate-900"></i>
            @break

        @case('fish')
            <i class="fa-solid fa-fish text-blue-600"></i>
            @break

        @case('bird')
            <i class="fa-solid fa-kiwi-bird text-orange-600"></i>
            @break

        @case('pig')
            <i class="fa-solid fa-piggy-bank text-pink-500"></i>
            @break

        @case('frog')
            <i class="fa-solid fa-frog text-green-600"></i>
            @break

        @case('horse')
            <i class="fa-solid fa-horse text-orange-900"></i>
            @break

        @case('cow')
            <i class="fa-solid fa-cow text-gray-400"></i>
            @break

        @default
            <span>otro</span>
            @break

    @endswitch
</div>
