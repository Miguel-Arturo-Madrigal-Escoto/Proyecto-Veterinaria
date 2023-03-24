<x-app-layout>
    {{-- {{ print_r($appointments) }} --}}

    <x-auth.user-dashboard :$appointments :$pets />
</x-app-layout>
