<div>
    @switch($species)
        @case('dog')
            <i class="fa-solid fa-dog"></i>
            @break

        @case('cat')
            <i class="fa-solid fa-cat"></i>
            @break

        @case('fish')
            <i class="fa-solid fa-fish"></i>
            @break

        @case('bird')
            <i class="fa-solid fa-kiwi-bird"></i>
            @break

        @case('pig')
            <i class="fa-solid fa-piggy-bank"></i>
            @break

        @case('frog')
            <i class="fa-solid fa-frog"></i>
            @break

        @case('horse')
            <i class="fa-solid fa-horse"></i>
            @break

        @case('cow')
            <i class="fa-solid fa-cow"></i>
            @break

        @default
            <span>otro</span>
            @break

    @endswitch
</div>
