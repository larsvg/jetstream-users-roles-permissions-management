<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Models\ObjectDefinition;
use App\Models\User;
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

}
