<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);
Route::get('admin/auth/logout', ['as' => 'admin.logout', 'uses' =>'Auth\AuthController@getLogout']);
Route::get('admin/auth/login', ['as' => 'admin.login.get', 'uses' => 'Auth\AuthController@getLogin' ]);
Route::post('admin/auth/login', ['as' => 'admin.login.post', 'uses' => 'Auth\AuthController@postLogin' ]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'acl']], function() {
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Logged\DashboardController@index']);
    Route::resource('permissions', 'Logged\PermissionsController');
});
