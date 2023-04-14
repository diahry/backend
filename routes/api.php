<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', 'UserController@get');

Route::post('/user', 'UserController@post');

Route::put('/user', 'UserController@put');

Route::delete('/user', 'UserController@delete');

Route::get('/pengumumans', 'PengumumanController@get');

Route::post('/pengumuman', 'PengumumanController@post');

Route::put('/pengumuman', 'PengumumanController@put');

Route::delete('/pengumuman', 'PengumumanController@delete');

Route::get('/registrasis', 'RegistrasiController@get');

//Route::post('/registrasi', [App\Http\Controllers\RegristrasiController::class, 'upload'])->name('upload');

Route::post('/registrasi', 'RegistrasiController@post');

Route::post('/updateRegistrasi/{id}', 'RegistrasiController@editRegistrasi');

Route::delete('/registrasi/{$id}', 'RegistrasiController@delete');

Route::get('/pembayarans', 'Info_PembayaranController@get');

Route::post('/pembayaran', 'Info_PembayaranController@post');

Route::post('/updatePembayaran/{id}', 'Info_PembayaranController@editPembayaran');

Route::delete('/pembayaran', 'Info_PembayaranController@delete');

Route::get('/sertifikats', 'SertifikatController@get');

Route::post('/sertifikat', 'SertifikatController@post');

Route::post('/updateSertifikat/{id}', 'SertifikatController@editSertifikat');

Route::delete('/sertifikat', 'SertifikatController@delete');

Route::get('/signs', 'SignController@get');

Route::post('/sign', 'SignController@post');

Route::put('/sign/{id}', 'SignController@put');

Route::delete('/sign', 'SignController@delete');