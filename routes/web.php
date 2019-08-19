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
Route::get('/', 'PagesController@index');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/tel', function () {
    return view('contact.tel');
});

//(call using URL: 127.0.0.1:8000/users/SAM)
Route::get('/users/{id}', function ($id){
    return 'This is user '.$id;
});

//(call using URL: 127.0.0.1:8000/users/lalaa/0123)
Route::get('/users/{id}/{name}', function ($id,$name){
    return 'This is user '.$name. ' with an id of '.$id;
});