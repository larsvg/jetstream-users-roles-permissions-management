<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class UserPermissions extends Component
{
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('user-management::livewire.user-permissions', [
            'user' => $this->user,
            'permissions' => $this->user->getAllPermissions(),
        ]);
    }


    public function togglePermission($permissionName)
    {
        $permission = Permission::where('name', $permissionName)->first();
        if ($permission) {

            $exists = \Larsvg\JetstreamUsersRolesPermissionsManagement\Models\ModelHasPermissions::where('model_id', $this->user->id)
                ->where('permission_id', $permission->id)
                ->exists();

            if ($exists) {
                $this->user->revokePermissionTo($permission);
            } else {
                $this->user->givePermissionTo($permission);
            }



        }
    }

}
