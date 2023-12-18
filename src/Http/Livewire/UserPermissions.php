<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserPermissions extends Component
{
    private User $user;

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

}
