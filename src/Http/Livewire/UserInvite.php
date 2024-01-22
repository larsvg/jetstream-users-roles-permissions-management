<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Request;
use Spatie\Permission\Models\Role;

class UserInvite extends Component
{
    public $email = '';
    public $role = 1;


    protected $rules = [
        'role' => 'required|exists:roles,id',
        'email' => 'required|email|unique:users,email',
    ];


    public function mount()
    {
        $this->role = Role::first()->id;
    }

    public function render()
    {
        if (!config('users-management.invite_users')) {
            return view('user-management::livewire.no-user-invite');
        }

        $roles = Role::all()->mapWithKeys(function ($role) {
            return [$role->id => $role->name];
        });

        return view('user-management::livewire.user-invite', compact('roles'));
    }


    public function submit()
    {
        $this->validate();

        $role = Role::find($this->role);

        dd($role);
    }

}