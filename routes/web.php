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

Route::get('/', 'OutletMapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/data-lokasi', 'lokasiController@index')->name('index');
Route::get('/tambah', 'lokasiController@tambah')->name('tambah-lokasi');
Route::post('/tambah', 'lokasiController@store')->name('tambah-lokasi');
Route::get('/{id}/show', 'lokasiController@show')->name('show-lokasi');


/*
 * Outlets Routes
 */
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');

//zona CRUD
Route::get('/zona', 'zonaController@index')->name('zona-index');
Route::post('/zona', 'zonaController@tambah')->name('tambah-zona');
Route::get('/{id}/edit', 'zonaController@edit')->name('edit-zona');
Route::post('/{id}/edit', 'zonaController@update')->name('update-zona');
Route::get('/{id}/hapus', 'zonaController@hapus')->name('hapus-zona');
Route::get('/{id}/detail', 'zonaController@detail')->name('detail-zona');

//JUKIR CRUD
Route::get('/jukir', 'jukirController@index')->name('jukir-index');
Route::post('/jukir', 'jukirController@tambah')->name('tambah-jukir');
Route::get('/{id}/jukir-edit', 'jukirController@edit')->name('edit-jukir');
Route::post('/{id}/jukir-edit', 'jukirController@update')->name('update-jukir');
Route::get('/{id}/jukir-hapus', 'jukirController@hapus')->name('hapus-jukir');
Route::get('/{id}/detail', 'zonaController@detail')->name('detail-zona');


