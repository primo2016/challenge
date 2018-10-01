<?php

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
    return redirect()->route('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth' ], function() {

	Route::get('/', 'AdminController@index')->name('dashboard');

	Route::resource('users', 'UsersController', ['as' => 'admin']);

	Route::resource('roles', 'RolesController', ['as' => 'admin']);

	Route::resource('files', 'FilesController',  ['as' => 'admin']);

	Route::middleware('role:admin')
		->put('users/{user}/roles', 'UsersRolesController@update')
		->name('admin.users.roles.update');
	// Route::get('users', 'UsersController@index')->name('admin.users.index');
	// Route::get('users/{id}', 'UsersController@show')->name('admin.users.show');
	// Route::get('users/{user}', 'UsersController@edit')->name('admin.users.edit');
	// Route::put('users/{user}', 'UsersController@update')->name('admin.users.update');
	// Route::delete('users/{user}', 'UsersController@destroy')->name('admin.users.destroy');

	Route::post('upload/{file}/files', 'UploadController@store')->name('admin.upload.store');
	Route::post('upload/{file}/update', 'UploadController@update')->name('admin.upload.update');

	Route::get('files/upload/archivo/{file}', 'UploadController@edit')->name('admin.files.upload.edit');


}); //Rutas de administracion

// Authentication Routes...
// Se copian las rutas desde la funcion auth() deel archivo: vendor\laravel\framework\src\Illuminate\Routing\Router.php
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');