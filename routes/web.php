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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/i', 'IngredientesController@index');
Route::get('/i/create', 'IngredientesController@create');
Route::post('/i/new', 'IngredientesController@store');

Route::get('/p', 'PlatosController@index');
Route::get('/p/create', 'PlatosController@create');
Route::post('/p/new', 'PlatosController@store');

Route::get('/o', 'OrdensController@index');
Route::get('/o/create', 'OrdensController@create');
Route::post('/o/new', 'OrdensController@store');