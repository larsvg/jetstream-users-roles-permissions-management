<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ];
    }
}
