<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {

    Route::group(['prefix' => 'auth'], function () {

        Route::post('login', 'AuthController@login')->name('api.login');
        Route::post('register', 'AuthController@register')->name('api.register');

        Route::group(['middleware' => 'auth:api'], function() {

            Route::post('logout', 'AuthController@logout')->name('api.logout');
            Route::post('token/check', 'AuthController@tokenCheck')->name('api.token.check');
        });
    });

    Route::group(['middleware' => 'auth:api'], function() {

        Route::group(['prefix' => 'contacts'], function () {

            Route::get('get', 'ContactController@getAll')->name('api.contacts.get.all');
            Route::get('get/{id}', 'ContactController@get')->name('api.contacts.get');
            Route::post('create', 'ContactController@create')->name('api.contacts.create');
            Route::post('update/{id}', 'ContactController@update')->name('api.contacts.update');
            Route::post('delete/{id}', 'ContactController@delete')->name('api.contacts.delete');
        });
    });
});

