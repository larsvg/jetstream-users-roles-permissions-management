<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $this->user->id,
            'role'         => 'required|exists:roles,id',
            'company_name' => 'nullable|string|max:255',
        ];
    }

}
