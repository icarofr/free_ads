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


Auth::routes(['verify' => true]);
Route::get('/', "IndexController@showIndex");
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// Route::get('/users/create', "UserController@create");
// Route::post('users/{user}/edit', "UserController@edit");