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


    //Login
    Route::get('login', ['middleware' => 'guest', 'uses' => 'LoginController@showlogin']);
    Route::post('login', 'LoginController@checklogin');
    Route::get('logout', 'LoginController@logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'MainController@dashboard');
        
        Route::group(['prefix' => 'items'], function () {
            Route::get('manage', 'ItemController@manage');
            Route::get('add', 'ItemController@showAdd');
            Route::post('add', 'ItemController@saveAdd');
            Route::get('edit/{id}', 'ItemController@showEdit');
            Route::post('edit/{id}', 'ItemController@saveEdit');
            Route::get('delete/{id}', 'ItemController@delete');
        });
        
        Route::group(['prefix' => 'outlets'], function () {
            Route::get('manage', 'OutletController@manage');
            Route::get('add', 'OutletController@showAdd');
            Route::post('add', 'OutletController@saveAdd');
            Route::get('edit/{id}', 'OutletController@showEdit');
            Route::post('edit/{id}', 'OutletController@saveEdit');
            Route::get('delete/{id}', 'OutletController@delete');
        });
        
        Route::group(['prefix' => 'inventories'], function () {
            Route::get('manage/{outlet}', 'InventoryController@manage');
        });
        
        Route::get('leadprofiles', ['as' => 'Report - Lead-Level Live Sales' , 'middleware' => 'requirerole:admin|reporter', 'uses' => 'EDUReportController@leadprofiles']);
    });

