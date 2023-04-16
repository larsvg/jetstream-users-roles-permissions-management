<?php

use App\Enums\PermissionsEnum;
use App\Http\Controllers\ObjectDefinitionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
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


    //Route::group(['middleware' => ['can:' . PermissionsEnum::VIEW_MAIN_NET_GRAPHS->value]], function () {


        Route::get('/users-overview', [UsersOverviewController::class, 'index'])
            ->name('users-overview.index');


    //});


});



