<x-app-layout>
    @if(Auth::user()->is_admin)
        <x-auth.admin-dashboard :$appointments :$pets :$clients />
    @else
        <x-auth.user-dashboard :$appointments :$pets />
    @endif
</x-app-layout>
