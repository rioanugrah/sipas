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
    return view('auth.login');
    // return view('welcome');
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
            Route::get('/unit_kerja', 'SuratMasukController@unit_kerja')->name('surat_masuk.unit_kerja');
            Route::get('/page/{id}', 'SuratMasukController@page')->name('surat_masuk.pages');
            Route::get('/disposisi/{id}', 'SuratMasukController@disposisi')->name('surat_masuk.disposisi');
            Route::post('/disposisi/simpan', 'SuratMasukController@disposisi_simpan')->name('surat_masuk.disposisi.simpan');
            Route::get('/{id}/berkas', 'SuratMasukController@berkas')->name('surat_masuk.berkas');
            Route::get('/simpan', 'SuratMasukController@simpan')->name('surat_masuk.simpan');
        });
        Route::prefix('surat_keluar')->group(function () {
            Route::get('/', 'SuratKeluarController@index')->name('surat_keluar');
            Route::get('/page/{id}', 'SuratKeluarController@page')->name('surat_keluar.pages');
            Route::post('/simpan', 'SuratKeluarController@simpan')->name('surat_keluar.simpan');
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
            Route::get('/{id}/edit', 'UnitKerjaController@edit')->name('unit_kerja.edit');
            Route::post('/simpan', 'UnitKerjaController@simpan')->name('unit_kerja.simpan');
            Route::post('/update', 'UnitKerjaController@update')->name('unit_kerja.update');
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('/', 'UsersController@index')->name('users');
            Route::post('/simpan', 'UsersController@simpan')->name('users.simpan');
            Route::get('/{id}', 'UsersController@index_user')->name('index.user');
        });
    });
});
