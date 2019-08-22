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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', 'APIPostsController@index'); //method get *tuk dpatkan list obj
Route::get('post/{id}', 'APIPostsController@show'); //post/{id} tuk tunjuk id yg select
Route::post('post', 'APIPostsController@store'); //
Route::put('post', 'APIPostsController@store'); //put *tuk update
Route::delete('post/{id}', 'APIPostsController@destroy');