<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Commands\JetstreamUsersRolesPermissionsManagementCommand;

class JetstreamUsersRolesPermissionsManagementServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('jetstream-users-roles-permissions-management')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_jetstream-users-roles-permissions-management_table')
            ->hasCommand(JetstreamUsersRolesPermissionsManagementCommand::class);
    }
}
