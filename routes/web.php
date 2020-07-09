<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/artis', 'ArtisController@index');
Route::get('/artis/create', 'ArtisController@create');
Route::post('/artis', 'ArtisController@store');
Route::get('/artis/{id}/edit', 'ArtisController@edit');
Route::patch('/artis/{id}', 'ArtisController@update');
Route::delete('/artis/{id}', 'ArtisController@destroy');

Route::get('/album', 'AlbumController@index');
Route::get('/album/create', 'AlbumController@create');
Route::post('/album', 'AlbumController@store');
Route::get('/album/{id}/edit', 'AlbumController@edit');
Route::patch('/album/{id}', 'AlbumController@update');
Route::delete('/album/{id}', 'AlbumController@destroy');

Route::get('/track', 'trackController@index');
Route::get('/track/create', 'TrackController@create');
Route::post('track', 'TrackController@store');
Route::delete('/track/{id}', 'TrackController@destroy');