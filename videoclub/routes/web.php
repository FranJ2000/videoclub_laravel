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

Route::redirect('/', app()->getLocale().'/index');

Route::group(['prefix' => '{language}'], function() {
	//Página principal
	Route::get('index', function() {
		return view('welcome');
	});
	//Cuando inicias sesión redirige aqui. Mirar LoginController
	Route::get('home', 'HomeController@index')->middleware('auth'); 
	Auth::routes(); //Habilita acceso a /{es|en}/{login|register|...}

	Route::get('catalog', 'CatalogController@getIndex')->middleware('auth');
	Route::get('catalog/create', 'CatalogController@getCreate')->middleware('auth');
	Route::post('catalog/create', 'CatalogController@postCreate')->middleware('auth');
	Route::get('catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');	
	Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');
});

// Edit, Rent, Return y delete al ser de tipo put o delete no acepta el prefijo de idioma. Los valores se devolveran por defecto en inglés.
Route::group(['middleware' => 'auth'], function() {
	Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
	Route::put('catalog/rent/{id}', 'CatalogController@putRent');
	Route::put('catalog/return/{id}', 'CatalogController@putReturn');
	Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');
});

