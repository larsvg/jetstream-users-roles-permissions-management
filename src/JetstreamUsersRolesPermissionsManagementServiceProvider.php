<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement;

use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\UsersOverview;
use Livewire\Livewire;
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
            ->name('users-management')
            ->hasRoute('web')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews('user-management')
            ->hasMigration('create_jetstream-users-roles-permissions-management_table');
    }
}
