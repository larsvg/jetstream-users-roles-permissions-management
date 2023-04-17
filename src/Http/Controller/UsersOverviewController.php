<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\ObjectDefinition;
use App\Models\User;

class UsersOverviewController extends Controller
{
    public function index()
    {
        return view('user-management::users-overview.index');
    }

    public function edit(User $user)
    {
        return view('user-management::users-overview.edit', compact('user'));
    }

}
