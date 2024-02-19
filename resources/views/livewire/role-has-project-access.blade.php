
<div>

    @foreach($projects as $project)
        <div wire:click="toggleAccess('{{ $role->id }}', '{{ $project->id }}')">
            @php
                $checked = \App\Models\RoleHasProjectAccess::where('role_id', $role->id)
                    ->where('project_id', $project->id)
                    ->exists();
            @endphp

            <input type="checkbox"  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                   @if($checked) checked @endif
            >

            <label class="{{ $checked ? '' : 'text-red-700 line-through' }}">
                {{ __($project->name) }}
            </label>
        </div>

    @endforeach

</div>
