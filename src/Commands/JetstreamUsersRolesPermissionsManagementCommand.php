<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Commands;

use Illuminate\Console\Command;

class JetstreamUsersRolesPermissionsManagementCommand extends Command
{
    public $signature = 'jetstream-users-roles-permissions-management';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
