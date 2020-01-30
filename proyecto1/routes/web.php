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

Route::get('/test', function() {
    return 'Aprendiendo las rutas';
});

Route::get('usuarios/{nomnre}',function($nombre='Fran'){
    return $nombre;
});

/*Route::get('/nosotros',function() {
    return view('nosotros');
});

Route::get('/contacto', function(){
    return view('contacto');
});*/

Route::get('/nosotros','PaginasController@nosotros');
Route::get('/contacto','PaginasController@contacto');
Route::get('/home','PagesController@home');

Route::put('foo/bar', function() {
	return 'Hola';
});