<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Traits;

use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

trait ValidateHash
{
    private int $hoursValid = 48;

    private function validateHash($hash)
    {
        if (!$hash) {
            abort(403);
        }

        try {
            $decrypt = Crypt::decrypt($hash);

            if (!is_array($decrypt)) {
                abort(400);
            }

            if (!isset($decrypt['email']) || !isset($decrypt['timestamp'])) {
                abort(400);
            }

            if (Carbon::createFromTimestamp($decrypt['timestamp']) < Carbon::now()->subHours($this->hoursValid)) {
                abort(419);
            }

            return $decrypt;
        } catch (DecryptException $e) {
            abort(400);
        }
    }
}
