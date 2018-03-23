<?php

use Illuminate\Http\Request;

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

Route::middleware('api')->group(function () {
    Route::get(
        '/posts',
        function (Request $request) {
            return [
                ['name' => 'test post 1', 'excerpt' => 'weeeeeeeeeeeee boyyyy', "id" => 1],
                ['name' => 'test post 2', 'excerpt' => 'weeeeeeeeeeeee boyyyy', "id" => 2],
                ['name' => 'test post 3', 'excerpt' => 'weeeeeeeeeeeee boyyyy', "id" => 3],
            ];
        }
    );

    Route::get('post', function () {
        return ['title' => 'test post 2', 'body' => 'weeeeeeeeeeeee boyyyy', "id" => 2];
    });
});
