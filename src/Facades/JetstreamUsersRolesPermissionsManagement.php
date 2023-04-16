<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Larsvg\JetstreamUsersRolesPermissionsManagement\JetstreamUsersRolesPermissionsManagement
 */
class JetstreamUsersRolesPermissionsManagement extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Larsvg\JetstreamUsersRolesPermissionsManagement\JetstreamUsersRolesPermissionsManagement::class;
    }
}
