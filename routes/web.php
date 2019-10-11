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

Route::get('/search/{slug}', 'SearchController@show');

Route::get('/users/{user}/wishlist', 'WishlistController@index');

Route::post('/users/{user}/wishlist/{game}', 'WishlistController@store');

Route::delete('/users/{user}/wishlist/{game}', 'WishlistController@destroy');

Route::get('users/{user}/review/', 'ReviewController@index');

Route::post('/users/{user}/review/{game}', 'ReviewController@store');

Route::delete('/users/{user}/review/{game}', 'ReviewController@destroy');

Route::any('/', function () {
    return redirect()->route('home');
});
