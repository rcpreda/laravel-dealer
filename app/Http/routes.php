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

Route::get('/', ['as' => 'welcome', 'uses' => 'Common\WelcomeController@index']);
Route::get('admin/auth/logout', ['as' => 'admin.logout', 'uses' =>'Auth\AuthController@getLogout']);
Route::get('admin/auth/login', ['as' => 'admin.login.get', 'uses' => 'Auth\AuthController@getLogin' ]);
Route::post('admin/auth/login', ['as' => 'admin.login.post', 'uses' => 'Auth\AuthController@postLogin' ]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'acl']], function() {
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Logged\DashboardController@index']);
    Route::resource('permissions', 'Logged\PermissionsController');
    Route::resource('car', 'Logged\Dealer\CarController');

});

Route::group(['prefix' => 'admin/ajax', 'middleware' => ['auth']], function() {
    Route::get('car-make', ['as' => 'admin.ajax.car.make', 'uses' => 'Logged\Dealer\CarController@getAjaxMake']);
    Route::post('car-models/{manufacturer}', ['as' => 'admin.ajax.car.models', 'uses' => 'Logged\Dealer\CarController@getAjaxModels']);
    Route::post('car-engines', ['as' => 'admin.ajax.car.engines', 'uses' => 'Logged\Dealer\CarController@getAjaxEngines']);
});
