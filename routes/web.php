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
Route::get('login/{driver}/', "Auth\LoginController@login");
Route::get('login/{driver}/callback', "Auth\LoginController@callback");
Route::post('logout', "Auth\LoginController@logout")->name('logout');

Route::get(
    'api/auth',
    function () {
        if (Auth::check()) {
            return new \App\Http\Resources\UserResource(Auth::user());
        } else {
            return response()->json(['data' => null]);
        }
    }
);

Route::get('/swap/{id}', function ($id) {
    Auth::loginUsingId($id);
    return back();
});

Route::prefix('api')->group(function () {
    Route::apiResource('posts', 'API\PostsController');
});


Route::prefix('/')->group(function () {
    Route::view('{any}', 'welcome')->where('any', '.*');
});

// Auth::routes();
