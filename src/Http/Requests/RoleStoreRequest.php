<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name',
        ];
    }
}
