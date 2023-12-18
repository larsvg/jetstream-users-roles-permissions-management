<div>
    @foreach($permissions as $permission)

        <div>
            @php
                $checked = $user->hasPermissionTo($permission->name)
            @endphp

            <x-checkbox
                name="{{ $permission->name }}"
                value="{{ $permission->name }}"
                label="{{ $permission->name }}"
                labelClass="{{ $checked ? '' : 'text-red-500 strikethrough' }}"
                :checked="$checked"
                />
        </div>

    @endforeach
</div>
