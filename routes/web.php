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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('b')->group(function () {
        // Route::get('/{any}', function($any){
        //     return view('layouts.backend_4.master1');
        // })->where('any', '([A-z\d-\/_.]+)?');
        // Route::get('/home', function(){
        //     return view('layouts.backend_4.master');
        // })->name('view');
        // Route::get('/home', 'DisplayController@index')->name('home');


        Route::get('/home', 'HomeController@index')->name('home');
        Route::prefix('surat_masuk')->group(function () {
            Route::get('/', 'SuratMasukController@index')->name('surat_masuk');
        });
        Route::prefix('surat_keluar')->group(function () {
            Route::get('/', 'SuratKeluarController@index')->name('surat_keluar');
        });
        Route::prefix('instansi')->group(function () {
            Route::get('/', 'InstansiController@index')->name('instansi');
            Route::get('/{id}', 'InstansiController@detail')->name('instansi.detail');
            Route::get('/{id}/edit', 'InstansiController@edit')->name('instansi.edit');
            Route::post('/simpan', 'InstansiController@simpan')->name('instansi.simpan');
            Route::post('/update', 'InstansiController@update')->name('instansi.update');
        });
        Route::prefix('klasifikasi')->group(function () {
            Route::get('/', 'KlasifikasiController@index')->name('klasifikasi');
            Route::get('/{id}', 'KlasifikasiController@detail')->name('klasifikasi.detail');
            Route::get('/{id}/edit', 'KlasifikasiController@edit')->name('klasifikasi.edit');
            Route::post('/simpan', 'KlasifikasiController@simpan')->name('klasifikasi.simpan');
            Route::post('/update', 'KlasifikasiController@update')->name('klasifikasi.update');
        });
        Route::prefix('unit_kerja')->group(function () {
            Route::get('/', 'UnitKerjaController@index')->name('unit_kerja');
            Route::post('/simpan', 'UnitKerjaController@simpan')->name('unit_kerja.simpan');
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('/', 'UsersController@index')->name('users');
            Route::get('/{id}', 'UsersController@index_user')->name('index.user');
        });
    });
});
