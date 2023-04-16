<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\ObjectDefinition;

class UsersOverviewController extends Controller
{
    public function index()
    {
        return view('user-management::users-overview.index');
    }
}
