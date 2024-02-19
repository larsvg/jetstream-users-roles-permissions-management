<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement;

use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\ModelHasProjectAccess;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\RecipientsByMailing;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\RecipientsByUser;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\RoleHasProjectAccess;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigration('2023_12_18_111909_add_company_name_to_users')
            ->hasMigration('2024_02_12_081922_create_mails_table')
            ->hasMigration('2024_02_12_082649_create_mail_recipients_table');
    }

    public function boot() {
        parent::boot();

        Livewire::component('recipients-by-user', RecipientsByUser::class);
        Livewire::component('recipients-by-mailing', RecipientsByMailing::class);
        Livewire::component('role-has-project-access', RoleHasProjectAccess::class);
        Livewire::component('model-has-project-access', ModelHasProjectAccess::class);
    }
}
