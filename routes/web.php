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
Route::get('/i/{ingrediente}/edit', 'IngredientesController@edit')->name('ingrediente.edit');
Route::patch('/i/{ingrediente}', 'IngredientesController@update')->name('ingrediente.update');

Route::get('/p', 'PlatosController@index');
Route::get('/p/create', 'PlatosController@create');
Route::post('/p/new', 'PlatosController@store');
Route::get('/p/{plato}/edit', 'PlatosController@edit')->name('plato.edit');
Route::patch('/p/{plato}', 'PlatosController@update')->name('plato.update');

Route::get('/o', 'OrdensController@index');
Route::get('/o/create', 'OrdensController@create');
Route::post('/o/new', 'OrdensController@store');
Route::get('/o/{orden}/edit', 'OrdensController@edit')->name('orden.edit');
Route::patch('/o/{orden}', 'OrdensController@update')->name('orden.update');
Route::get('/o/{orden}', 'OrdensController@show');
Route::patch('/o/{orden}/cancel', 'OrdensController@payment')->name('orden.payment');