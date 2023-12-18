@php
/**
 * @var Spatie\Permission\Models\Role $roles
 */
@endphp

<x-app-layout>

    <div class="px-0 lg:px-8 py-8 flex flex-col gap-8">

        <x-page-title>
            {{ __('users-management::pages/roles-index.title') }}
        </x-page-title>

        <div class="flex flex-col gap-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8">

                <div class="flex flex-col gap-4">

                    <div class="overflow-x-auto -mx-8">

                        <table class="w-full min-w-[600px]">
                            @foreach($roles as $role)
                                <tr class="border-b border-gray-200 even:bg-gray-100 hover:bg-yellow-50 transition-all">
                                    <td class="p-2">
                                        {{ $role->name }}
                                    </td>
                                    <td class="text-right p-2">
                                        <a href="{{ route('roles.edit', $role) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                            {{ __('buttons.details') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    @if ($roles->lastPage() > 1)
                        <div class="mb-8 mt-4">
                            {{ $roles->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <div>
            <x-a href="{{ route('roles.create') }}">

                {{ __('users-management::pages/roles-create.title') }}

            </x-a>
        </div>
    </div>
</x-app-layout>
