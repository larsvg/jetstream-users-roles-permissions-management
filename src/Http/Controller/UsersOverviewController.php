<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersOverviewController extends Controller
{
    public function index()
    {
        return view('user-management::users-overview.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all()->mapWithKeys(function($key) {
            return [
                $key->id => $key->name,
            ];
        });

        $selected = $user->roles->first()?->id;
        return view('user-management::users-overview.edit', compact('user', 'roles', 'selected'));
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        $role = Role::where('id', $request->get('role'))->firstOrFail();
        $user->removeRole($user->roles->first());
        $user->assignRole($role);

        $request->session()->flash('success', __('notifications.saved'));

        return redirect()->route('users-overview.index');
    }

}
