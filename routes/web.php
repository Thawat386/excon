<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::get('admin', '\Modules\Admin\Http\Controllers\AdminController@index')->name('index');
 Route::get('user', '\Modules\Admin\Http\Controllers\UserController@index')->name('user.index');
 Route::resource('permission', 'PermissionController');
 Route::resource('role', 'RoleController');


 Route::get('/profile', '\Modules\Admin\Http\Controllers\UserController@profile')->name('user.profile');

 Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

 Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
 Route::post('/postRole', 'RoleController@store');
 Route::get('/getAllUsers', 'UserController@getAll');
 Route::get('/getAllRoles', 'RoleController@getAll');
 Route::get('/getAllPermissions', 'PermissionController@getAll');

 Route::post('/account/create', 'UserController@store');

});