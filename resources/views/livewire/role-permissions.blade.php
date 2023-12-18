@php
/**
 * @var \Spatie\Permission\Models\Role $role
 * @var Spatie\Permission\Models\Permission $permissions
 */
@endphp

<div>

    @foreach($permissions as $permission)
        <div wire:click="togglePermission('{{ $permission->name }}')">
            @php
                $checked = \Larsvg\JetstreamUsersRolesPermissionsManagement\Models\RoleHasPermissions::where('role_id', $role->id)
                    ->where('permission_id', $permission->id)
                    ->exists();
            @endphp

            <input type="checkbox"  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                   @if($checked) checked @endif
            >

            <label class="{{ $checked ? '' : 'text-red-700 line-through' }}">
                {{ __($permission->name) }}
            </label>
        </div>

    @endforeach
</div>
