<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Larsvg\JetstreamUsersRolesPermissionsManagement\JetstreamUsersRolesPermissionsManagementServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Larsvg\\JetstreamUsersRolesPermissionsManagement\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            JetstreamUsersRolesPermissionsManagementServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_jetstream-users-roles-permissions-management_table.php.stub';
        $migration->up();
        */
    }
}
