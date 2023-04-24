<x-app-layout>

    @foreach ($pets as $pet)
        @if($pet->vaccines->isNotEmpty())
            <x-helpers.simple-form-boilerplate>
                <x-vaccine.pet-vaccines :$pet />
            </x-helpers.simple-form-boilerplate>
        @endif
    @endforeach
</x-app-layout>
