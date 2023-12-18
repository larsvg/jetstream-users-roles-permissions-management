<?php

use App\Enums\PermissionsEnum;
use Illuminate\Support\Facades\Route;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller\RolesController;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller\UsersOverviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('welcome');
})->name('test');


Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {


    Route::group(['middleware' => ['can:' . PermissionsEnum::MANAGE_USERS->value]], function () {


        Route::get('/users-overview', [UsersOverviewController::class, 'index'])
            ->name('users-overview.index');

        Route::get('/user-overview/{user}/edit', [UsersOverviewController::class, 'edit'])
            ->name('users-overview.edit');

        Route::put('/user-overview/{user}', [UsersOverviewController::class, 'update'])
            ->name('users-overview.update');

        Route::get('/roles/create', [RolesController::class, 'create'])
            ->name('roles.create');

        Route::post('/roles/store', [RolesController::class, 'store'])
            ->name('roles.store');

        Route::get('/roles/{role}', [RolesController::class, 'show'])
            ->name('roles.show');

        Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])
            ->name('roles.edit');

        Route::put('/roles/{role}/update', [RolesController::class, 'update'])
            ->name('roles.update');

        Route::get('/roles', [RolesController::class, 'index'])
            ->name('roles.index');

    });


});



