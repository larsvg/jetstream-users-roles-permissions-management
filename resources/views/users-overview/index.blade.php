
<x-app-layout>

    <div class="px-8 py-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">

            <h1 class="text-2xl font-medium text-gray-900 mb-6">
                {{ __('users-management::pages/users-overview.title') }}
            </h1>

            @livewire('users-overview')

        </div>
    </div>
</x-app-layout>
