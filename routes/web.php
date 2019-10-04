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

Route::get('/search', 'SearchController@index');

Route::get('/search/{title}/{platform}', 'SearchController@show');

Route::resource('/user/games', 'PlayedGamesController');

Route::any('/', function () {
    return redirect()->route('home');
});
