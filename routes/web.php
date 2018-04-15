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
    Route::get('/swap/{id}', function ($id) {
        Auth::loginUsingId($id);
        return back();
    });

Route::prefix('/')->group(function () {
    Route::view('{any}', 'welcome')->where('any', '.*');
});

Auth::routes();
