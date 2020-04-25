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
    return redirect('login');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coba', 'HomeController@coba');

// Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::group(['middleware'=>'is_admin','prefix' => 'admin'], function(){

    Route::get('/karyawan', 'KaryawanController@index');
    Route::post('/simpan-karyawan', 'KaryawanController@store');

    Route::get('/lokasi', 'LokasiController@index');
    Route::post('/simpan-lokasi', 'LokasiController@store');
    Route::post('/update-lokasi', 'LokasiController@update');
    Route::get('/hapus-lokasi/{id}', 'LokasiController@destroy');

    Route::get('/pokok-persolanan', 'PokokPersoalanController@index');
    Route::post('/simpan-pokok-persolanan', 'PokokPersoalanController@store');
    Route::post('/update-jenis-dokumen', 'PokokPersoalanController@update');
    Route::get('/hapus-jenis-dokumen/{id}', 'PokokPersoalanController@destroy');
    
    Route::get('/anak-persoalan', 'AnakPersoalanController@index');
    Route::post('/simpan-anak-persoalan', 'AnakPersoalanController@store');
    Route::post('/update-anak-persoalan', 'AnakPersoalanController@update');
    Route::get('/hapus-anak-persoalan/{id}', 'AnakPersoalanController@destroy');

    Route::get('/perihal', 'PerihalController@index');
    Route::post('/simpan-perihal', 'PerihalController@store');
    Route::post('/update-perihal', 'PerihalController@update');
    Route::get('/hapus-perihal/{id}', 'PerihalController@destroy');
    
    Route::get('/jra', 'JraController@index');
    Route::post('/simpan-jra', 'JraController@store');
    Route::post('/update-jra', 'JraController@update');
    Route::get('/hapus-jra/{id}', 'JraController@destroy');
    
    Route::get('/manajemen', 'MMasterDataController@index');
    Route::post('/simpan-manajemen', 'MMasterDataController@store');
    Route::post('/hapus-manajemen/{id}', 'MMasterDataController@destroy');
    
    Route::get('/cari-dokumen', 'CariDokumenController@index')->name('admin.home');
    Route::get('/proses-cari', 'CariDokumenController@cari');
    
    Route::get('/form-penyimpanan', 'SimpanController@index');
    Route::post('/simpan-dokumen', 'SimpanController@store');
    Route::get('/daftar-dokumen', 'SimpanController@create');
    Route::get('/detil-dokumen/{id}', 'SimpanController@show');
    Route::get('/edit-dokumen/{id}', 'SimpanController@edit');
    Route::post('/update-dokumen', 'SimpanController@update');
    Route::get('/hapus-dokumen', 'SimpanController@destroy');
    

    Route::get('/form-peminjaman', 'PeminjamanController@index');
    Route::post('/simpan-peminjaman', 'PeminjamanController@store');
    Route::get('/daftar-peminjaman', 'PeminjamanController@daftar');
    Route::get('/detil-peminjaman/{id}', 'PeminjamanController@show');
    Route::get('/delete-peminjaman/{id}', 'PeminjamanController@destroy');
    Route::get('/pesanWA/{id}', 'PeminjamanController@notifwa');

    Route::get('pengembalian', 'PengembalianController@index');
    Route::get('cari-pengembalian', 'PengembalianController@cari');
    Route::post('kembali', 'PengembalianController@update');
    Route::get('daftar', 'PengembalianController@create');

    Route::get('daftar-pengajuan', 'PengajuanController@pengajuan');
    Route::post('tolak', 'PengajuanController@tolak');
    Route::post('terima', 'PengajuanController@terima');

    Route::get('retensi', 'RetensiController@index');
    Route::post('update-retensi/{id}', 'RetensiController@update');
    Route::get('arsip', 'RetensiController@musnah');
    Route::get('daftar-arsip', 'RetensiController@daftararsip');
    Route::get('view-arsip/{id}', 'RetensiController@show');
});

Route::group(['prefix' => 'karyawan'], function(){
    Route::get('pengajuan', 'PengajuanController@index');
    Route::post('ajukan', 'PengajuanController@store');
    Route::get('daftar', 'PengajuanController@create');
    Route::get('view-dokumen/{id}', 'PengajuanController@show');
    // Route::get('password', 'PengajuanController@create');
});
