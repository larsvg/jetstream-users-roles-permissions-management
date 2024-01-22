<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Mail\UserInvitation;
use Livewire\Component;
use Livewire\Request;
use Spatie\Permission\Models\Role;

class UserInvite extends Component
{
    public $email = '';
    public $role  = 1;


    protected $rules = [
        'role'  => 'required|exists:roles,id',
        'email' => 'required|email|unique:users,email',
    ];


    public function mount()
    {
        $this->role = Role::orderBy('id', 'desc')->first()->id;
    }

    public function render()
    {
        if (!config('users-management.invite_users')) {
            return view('user-management::livewire.no-user-invite');
        }

        $roles = Role::all()->mapWithKeys(function($role) {
            return [$role->id => $role->name];
        });

        return view('user-management::livewire.user-invite', compact('roles'));
    }


    public function submit()
    {
        $this->validate();

        $role = Role::find($this->role);

        Mail::to([$this->email])
            ->send(new UserInvitation($this->email, $role));

        request()->session()->flash('success', __('users-management::pages/users-overview.notification.sent'));

        return redirect()->route('users-overview.index');
    }

}
