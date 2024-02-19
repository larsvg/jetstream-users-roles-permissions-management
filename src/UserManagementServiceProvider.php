<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement;

use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\MailReceivers;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire\MailRecipients;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UserManagementServiceProvider extends PackageServiceProvider
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
            ->hasMigration('2023_12_18_111909_add_company_name_to_users');
    }

    public function boot() {
        parent::boot();

        Livewire::component('mail-recipients', MailRecipients::class);
        Livewire::component('mail-receivers', MailReceivers::class);
    }
}
