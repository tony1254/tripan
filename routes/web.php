<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */
Auth::routes();
Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/panel-de-control', ['uses' => 'HomeController@controlPanel', 'as' => 'controlPanel']);

Route::get('/', ['uses' => 'HomeController@raiz', 'as' => 'raiz']);

// Route::group(['middleware' => 'web'], function () {

// });

// Route::group(['middleware' => 'guest'], function () {

// });
// Route::group(['middleware' => 'auth'], function () {
// });