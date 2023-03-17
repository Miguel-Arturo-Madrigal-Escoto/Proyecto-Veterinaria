<div>
    @switch($species)
        @case('dog')
            <x-fas-dog class="h-8 w-8" />
            @break

        @case('cat')
            <x-fas-cat class="h-8 w-8" />
            @break

        @case('fish')
            <x-fas-fish class="h-8 w-8" />
            @break



        @default

    @endswitch
</div>
