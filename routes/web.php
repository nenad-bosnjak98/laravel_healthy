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

Route::get('/', 'App\Http\Controllers\PageController@index');

//Route::get('/salads', 'App\Http\Controllers\PageController@salads');

//Route::get('/snacks', 'App\Http\Controllers\PageController@snacks');

//Route::get('/smoothies', 'App\Http\Controllers\PageController@smoothies');

Route::resource('salads', 'App\Http\Controllers\SaladController');

Route::resource('snacks', 'App\Http\Controllers\SnackController');

Route::resource('smoothies', 'App\Http\Controllers\SmoothieController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
