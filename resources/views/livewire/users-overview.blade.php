@php
    /**
     * @var App\Models\User $users
     */
@endphp
<div class="flex flex-col gap-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">

        <div class="w-full">
            <x-input id="searchword" placeholder="{{ __('users-management::pages/users-overview.placeholder.search') }}" class="block mt-1 w-full" type="text" name="searchword" wire:model="searchWord" />
        </div>

    </div>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8">

        <div class="flex flex-col gap-4">

            <div class="overflow-x-auto -mx-8">

                <table class="w-full min-w-[600px]">
                    <tr class=" bg-gray-50 border-b border-t border-gray-200">
                        <th class="text-left p-2">
                            {{ __('users-management::pages/users-overview.table.name') }}
                        </th>
                        <th class="text-left p-2">
                            {{ __('users-management::pages/users-overview.table.role') }}
                        </th>
                        <th class="text-left p-2">
                            {{ __('users-management::pages/users-overview.table.last_activity') }}
                        </th>
                        <th class="text-left p-2">

                        </th>
                    </tr>
                    @foreach($users as $user)
                        <tr class="border-b border-gray-200 odd:bg-gray-100 hover:bg-yellow-50 transition-all">
                            <td class="p-2">
                                {{ $user->name }}
                            </td>
                            <td class="p-2">
                                {{ implode(', ', $user->getRoleNames()->toArray()) }}
                            </td>
                            <td class="p-2">
                                {{ $user->last_activity ? $user->last_activity->format('d-m-Y H:i') : '-' }}
                            </td>
                            <td>
                                <a href="{{ route('users-overview.edit', $user) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ __('buttons.details') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            @if ($users->lastPage() > 1)
                <div class="mb-8 mt-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
