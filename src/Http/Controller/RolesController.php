<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);

        return view('user-management::roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('user-management::roles.show', compact('role'));
    }

    public function create()
    {
        return view('user-management::roles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->name]);
        $request->session()->flash('success', __('notifications.saved'));
        return redirect()->route('roles.update', $role);
    }

    public function edit(Role $role)
    {
        return view('user-management::roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $role->update(['name' => $request->name]);
        $request->session()->flash('success', __('notifications.saved'));
        return redirect()->route('roles.index');
    }
}
