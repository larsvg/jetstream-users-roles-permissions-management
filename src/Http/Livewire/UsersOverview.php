<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersOverview extends Component
{
    public $searchWord = '';

    public function render()
    {
        $users = User::query();
        if ($this->searchWord > '') {
            $users->where('name', 'LIKE', $this->searchWord . '%')
                ->orWhere('email', 'LIKE', $this->searchWord . '%');
        }

        return view('user-management::livewire.users-overview', [
            'users' => $users->paginate(),
        ]);
    }

}
