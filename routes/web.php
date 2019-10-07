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

Route::post('/users/{user}/wishlist', 'WishlistController@store');

Route::delete('/users/{user}/wishlist', 'WishlistController@destroy');

Route::any('/', function () {
    return redirect()->route('home');
});
