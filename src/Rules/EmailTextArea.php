<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailTextArea implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            return;
        }

        $value  = str_replace("\r", '', $value);
        $emails = explode("\n", $value);

        if (count($emails) === 0) {
            return;
        }

        foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $fail('The :attribute must be a valid email address.');
            }

            $user = User::where('email', $email)->first();

            if (!empty($user)) {
                $fail('Mailadress ' . $email . ' already exists as a user.');
            }

        }
    }

}
