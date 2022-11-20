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
     return redirect(\route('users'));
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [\App\Http\Controllers\UsersController::class,'index'])->name('users');
    Route::get('/data', [\App\Http\Controllers\UsersController::class,'data']);
    Route::get('/create', [\App\Http\Controllers\UsersController::class,'create'])->name('users.create');
    Route::get('{user}/edit',  [\App\Http\Controllers\UsersController::class,'edit']);
    Route::post('/',  [\App\Http\Controllers\UsersController::class,'store']);
    Route::delete('{user}/delete',  [\App\Http\Controllers\UsersController::class,'delete']);
});
Route::group(['prefix' => 'admins'], function () {
    Route::get('/', [\App\Http\Controllers\AdminsController::class,'index'])->name('admins');
    Route::get('/data', [\App\Http\Controllers\AdminsController::class,'data']);
    Route::get('/create', [\App\Http\Controllers\AdminsController::class,'create'])->name('admins.create');
    Route::get('{user}/edit',  [\App\Http\Controllers\AdminsController::class,'edit']);
    Route::post('/',  [\App\Http\Controllers\AdminsController::class,'store']);
    Route::delete('{user}/delete',  [\App\Http\Controllers\AdminsController::class,'delete']);
});
