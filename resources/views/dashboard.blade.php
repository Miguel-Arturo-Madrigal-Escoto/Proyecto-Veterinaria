<x-app-layout>
    @can('show-admin-dashboard')
        <x-auth.admin-dashboard :$appointments :$pets :$clients />
    @else
        <x-auth.user-dashboard :$appointments :$pets />
    @endcan
</x-app-layout>
