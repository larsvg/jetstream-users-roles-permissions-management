@php
    /**
     * @var \App\Models\ObjectDefinition $objectDefinitions
     */
@endphp

<x-app-layout>

    <div class="px-8 py-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            @livewire('users-overview')

        </div>
    </div>
</x-app-layout>
