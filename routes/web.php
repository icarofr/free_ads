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
// Route::get('/', function() {return view('welcome');});
Route::get('/', "IndexController@showIndex");
Route::post("/user/", "UserController@store");
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/user/create', "UserController@create");
Route::get('/user/{user}', "UserController@show");
Route::get('/user/{user}/edit', "UserController@edit");
Route::get('/user/{user}/delete', "UserController@destroy");
Route::put('/user/{user}', "UserController@update");
Route::get('/ad', "AdController@index");
Route::post('/ad', "AdController@store");
Route::get('/ad/create', "AdController@create");
Route::get('/ad/{ad}', "AdController@show");
Route::get('/ad/{ad}/edit', "AdController@edit");
Route::get('/ad/{ad}/delete', "AdController@destroy");
Route::put('/ad/{ad}', "AdController@update");

// Route::get('/users/create', "UserController@create");
// Route::post('users/{user}/edit', "UserController@edit");