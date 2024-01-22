
<x-app-layout>

    <div class="px-0 lg:px-8 py-8 flex flex-col gap-8">

        <x-page-title>
            {{ __('users-management::pages/users-overview.title') }}
        </x-page-title>

        @livewire('users-overview')

        @livewire('user-invite')
    </div>
</x-app-layout>
