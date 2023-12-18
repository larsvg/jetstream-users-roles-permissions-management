@php
/**
 * @var \App\Models\User $user
 * @var Spatie\Permission\Models\Permission $permissions
 */
@endphp

<div>

    @foreach($permissions as $permission)
        <div wire:click="togglePermission('{{ $permission->name }}')">
            @php
                $checked = \Larsvg\JetstreamUsersRolesPermissionsManagement\Models\ModelHasPermissions::where('model_id', $user->id)
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
