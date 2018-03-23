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

Route::prefix('/')->group(function () {

    Route::prefix('api')->group(function () {
        Route::get('test/{id}', function ($id) {
            return response()->json(["test", 'foo', "bar", 'hurr', 'durr']);
        });
    });
    Route::view('{any}', 'welcome')->where('any', '.*');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
