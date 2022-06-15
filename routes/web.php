<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'InicioController@index')->name('inicio.index');

Route::get('/recetas', 'RecetaController@index' )->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create' )->name('recetas.create');
Route::post('/recetas', 'RecetaController@store' )->name('recetas.store');
Route::get('/recetas/{receta}', 'RecetaController@show' )->name('recetas.show');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('recetas.update');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');

Route::get('/categoria/{categoriaReceta}', 'CategoriasController@show')->name('categorias.show');
Route::get('/reserva', 'ReservaController@index')->name('reservas.index');
Route::get('/reserva/{receta}/create', 'ReservaController@create')->name('reservas.create');
Route::post('/reserva', 'ReservaController@store' )->name('reservas.store');
Route::get('/reserva/{reserva}', 'ReservaController@show' )->name('reservas.show');
Route::get('/reservas/{receta}', 'ReservaController@reservations' )->name('reservas.reservations');
Route::get('/reserva/{reserva}/edit', 'ReservaController@edit')->name('reservas.edit');
Route::put('/reservas/{reserva}', 'ReservaController@update')->name('reservas.update');
Route::delete('/reservas/{reserva}', 'ReservaController@destroy')->name('reservas.destroy');

// Buscador de Recetas
Route::get('/buscar', 'RecetaController@search')->name('buscar.show');

// Route::resource('recetas', 'RecetaController');

Route::get('/perfiles/{perfil}', 'PerfilController@show')->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit')->name('perfiles.edit');
Route::put('/perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');



// Almacena los likes de las recetas
Route::post('/recetas/{receta}', 'LikesController@update')->name('likes.update');

Auth::routes();

Route::get('/create-symlink', function (){
    symlink(storage_path('/app/public'), public_path('storage'));
    echo "Symlink Created. Thanks";
});