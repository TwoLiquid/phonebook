<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index')->name('index');

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {

    Route::get('login', 'AuthController@login')->name('login');
    Route::post('login', 'AuthController@authenticate')->name('login.make');
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('register', 'AuthController@store')->name('store');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('restore', 'AuthController@restore')->name('restore');
    Route::post('restore', 'AuthController@createRestoreCode')->name('restore.code');
    Route::post('change', 'AuthController@changePassword')->name('change');

    Route::group(['middleware' => 'auth:dashboard'], function () {

        Route::group(['prefix' => 'contacts'], function () {

            Route::get('/', 'ContactController@index')->name('contacts');
            Route::get('create', 'ContactController@create')->name('contacts.create');
            Route::post('create', 'ContactController@store')->name('contacts.store');
            Route::get('{id}/view', 'ContactController@view')->name('contacts.view');
            Route::get('{id}/edit', 'ContactController@edit')->name('contacts.edit');
            Route::post('{id}/edit', 'ContactController@update')->name('contacts.update');
            Route::post('{id}/delete', 'ContactController@delete')->name('contacts.delete');
        });
    });
});
