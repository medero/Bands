<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('bands');
});

Route::get('bands', 'BandsController@index');
Route::get('bands/create', 'BandsController@create');
Route::get('bands/edit/{band}', 'BandsController@edit');
Route::get('bands/delete/{band}', 'BandsController@delete');
Route::post('bands/save/{id}', 'BandsController@save');

Route::get('albums', 'AlbumsController@index');
