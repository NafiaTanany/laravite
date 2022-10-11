<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
     return view('welcome');
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('/data', 'UsersController@data');
    Route::get('/create', 'UsersController@create')->name('users.create');
    Route::get('{user}/edit', 'UsersController@edit');
    Route::post('/', 'UsersController@store');
    Route::delete('{user}/delete', 'UsersController@delete');
});
