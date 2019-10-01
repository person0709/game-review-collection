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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'GamesController@index');

Route::get('/search/{title}/{platform}', 'GamesController@show');

Route::any('/', function () {
    return redirect()->route('home');
});
