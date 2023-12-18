<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Models\ModelHasPermissions;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Models\RoleHasPermissions;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissions extends Component
{
    public Role $role;

    public function mount(Role $role): void
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('user-management::livewire.role-permissions', [
            'role'        => $this->role,
            'permissions' => Permission::get(),
        ]);
    }


    public function togglePermission($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();
        if ($permission) {

            $exists = RoleHasPermissions::where('role_id', $this->role->id)
                ->where('permission_id', $permission->id)
                ->exists();

            if ($exists) {
                $this->role->revokePermissionTo($permission);
            } else {
                $this->role->givePermissionTo($permission);
            }
        }
    }

}
