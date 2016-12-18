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

Route::resource('bands', 'BandsController');
Route::resource('albums', 'AlbumsController');

/* Deprecated in favor of ::resource
    Route::get('bands', 'BandsController@index');
    Route::get('bands/{$band}/edit', 'BandsController@edit');
    Route::get('bands/{$band}/delete', 'BandsController@delete');
    Route::post('bands/save/{id}', 'BandsController@save');
    Route::post('bands/create', 'BandsController@create');
    Route::get('albums', 'AlbumsController@index');
    Route::get('albums/edit/{band}', 'AlbumsController@edit');
 */
