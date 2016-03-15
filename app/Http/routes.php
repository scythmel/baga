<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Login
Route::get('login', ['middleware' => 'guest', 'uses' => 'LoginController@showlogin']);
Route::post('login', 'LoginController@checklogin');
Route::get('logout', 'LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('leadprofiles', ['as' => 'Report - Lead-Level Live Sales' , 'middleware' => 'requirerole:admin|reporter', 'uses' => 'EDUReportController@leadprofiles']);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
