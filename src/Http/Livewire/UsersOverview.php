<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersOverview extends Component
{
    public function render()
    {
        $users = User::paginate();





        return view('user-management::livewire.users-overview', [
            'users' => $users,
        ]);
    }
}
