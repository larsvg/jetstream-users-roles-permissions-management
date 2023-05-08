
<x-app-layout>

    <div class="px-0 lg:px-8 py-8 flex flex-col gap-8">
        <h1 class="text-2xl font-medium text-gray-900">
            {{ __('users-management::pages/users-overview.title') }}
        </h1>

        @livewire('users-overview')
    </div>
</x-app-layout>
