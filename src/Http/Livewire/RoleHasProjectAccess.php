<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleHasProjectAccess extends Component
{
    public Role $role;

    public function mount(Role $role): void
    {
        $this->role = $role;
    }

    public function render()
    {
        $projects = Project::get();

        return view('user-management::livewire.role-has-project-access', [
            'role'     => $this->role,
            'projects' => $projects,
        ]);
    }

    public function toggleAccess(Role $role, Project $project)
    {
        $model = \App\Models\RoleHasProjectAccess::where('role_id', $role->id)
            ->where('project_id', $project->id)
            ->first();

        if ($model) {
            $model->delete();
        } else {
            \App\Models\RoleHasProjectAccess::create([
                'role_id'    => $role->id,
                'project_id' => $project->id,
            ]);
        }
    }

}
