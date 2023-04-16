<div>
    <table class="w-full">
        <tr class=" bg-gray-50 border-b border-t border-gray-200">
            <th>
                {{ __('pages/users-overview.table.name') }}
            </th>
            <th>
                {{ __('pages/users-overview.table.role') }}
            </th>
            <th>
                {{ __('pages/users-overview.table.last_activity') }}
            </th>
            <th>

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
                    <a href="" class="text-blue-600 hover:text-blue-800 hover:underline">
                        {{ __('buttons.details') }}
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
