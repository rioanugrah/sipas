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
        Route::get('/home', 'HomeController@index')->name('home');
        Route::prefix('surat_masuk')->group(function () {
            Route::get('/', 'SuratMasukController@index')->name('surat_masuk');
        });
        Route::prefix('surat_keluar')->group(function () {
            Route::get('/', 'SuratKeluarController@index')->name('surat_keluar');
        });
        Route::prefix('instansi')->group(function () {
            Route::get('/', 'InstansiController@index')->name('instansi');
            Route::post('/simpan', 'InstansiController@simpan')->name('instansi.simpan');
        });
        Route::prefix('pengguna')->group(function () {
            Route::get('/', 'UsersController@index')->name('users');
            Route::get('/{id}', 'UsersController@index_user')->name('index.user');
        });
    });
});
