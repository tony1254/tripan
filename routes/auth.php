<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::resource('user', 'UserController');
Route::resource('file', 'FileController');
Route::resource('permission', 'PermissionController');
Route::get('menu-test', 'MenuController@index');

Route::get('catalog/{table}', ['uses' => 'CatalogController@indexTable', 'as' => 'catalogo.tabla.index']);
Route::get('catalog/', ['uses' => 'CatalogController@index', 'as' => 'catalogo.index']);

Route::get('subir/GFMIS', ['uses' => 'Upload\GfmisController@index', 'as' => 'upload.GFMIS.index']);
Route::post('subir/GFMIS', ['uses' => 'Upload\GfmisController@store', 'as' => 'upload.GFMIS.store']);
Route::get('subir/GFMIS/create', ['uses' => 'Upload\GfmisController@create', 'as' => 'upload.GFMIS.create']);

Route::get('generador-de-formularios', ['uses' => 'FormGeneratorController@index', 'as' => 'formGenerator.index']);
Route::post('generador-de-formularios', ['uses' => 'FormGeneratorController@store', 'as' => 'formGenerator.store']);
