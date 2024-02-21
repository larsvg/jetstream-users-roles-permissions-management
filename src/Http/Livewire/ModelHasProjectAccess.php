<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;
class ModelHasProjectAccess extends Component
{
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        $projects = Project::get();

        return view('user-management::livewire.model-has-project-access', [
            'user'     => $this->user,
            'projects' => $projects,
        ]);
    }

    public function toggleAccess(User $user, Project $project)
    {
        $model = \App\Models\ModelHasProjectAccess::where('model_id', $user->id)
            ->where('project_id', $project->id)
            ->first();

        if ($model) {
            $model->delete();
        } else {
            \App\Models\ModelHasProjectAccess::create([
                'model_id'    => $user->id,
                'model_type' => 'App\Models\User',
                'project_id' => $project->id,
            ]);
        }
    }

}
