<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


Route::get('/cek-db', 'UserPerdoski@cek_db');
Route::get('ambil-permohonan','BorangController@ambil_permohonan');
Route::get('ambil-borang','BorangController@ambil_borang');
Route::get('ambil-element','BorangController@ambil_element');
Route::get('ambil-document-borang','BorangController@ambil_document_borang');
Route::get('ambil-document-bukti','BorangController@ambil_document_bukti');

Route::get('view-import-user','UserPerdoski@view_import');
Route::post('import-user','UserPerdoski@import_excel')->name('import-user');

Route::get('view-import-permohonan','BorangController@view_import_permohonan');
Route::post('import-permohonan','BorangController@import_permohonan')->name('import-permohonan');

Route::get('import','BorangController@view_import_dokumen_bukti');
Route::post('import-post','BorangController@ambil_dokument_borang_post')->name('import-post');

Route::get('ambil-user', 'UserPerdoski@getUser');
