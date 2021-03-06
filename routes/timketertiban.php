<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('timketertiban')->user();

    //dd($users);

    return view('timketertiban.home');
})->name('home');

//MASTER JENIS PELANGGARAN
Route::get('/masterjenispel', 'JenispelController@index')->name('masterjenispel');
Route::post('/masterjenispel/tambah', 'JenispelController@store')->name('tambahjenispel');
Route::get('/masterjenispel/hapus/{id}', 'JenispelController@destroy')->name('hapusjenispel');
Route::get('/masterjenispel/edit/{id}', 'JenispelController@edit')->name('editjenispel');
Route::post('/masterjenispel/update', 'JenispelController@update')->name('updatejenispel');

//MASTER JENIS PRESTASI
Route::get('/masterjenispres', 'JenispresController@index')->name('masterjenispres');
Route::post('/masterjenispres/tambah', 'JenispresController@store')->name('tambahjenispres');
Route::get('/masterjenispres/hapus/{id}', 'JenispresController@destroy')->name('hapusjenispres');
Route::get('/masterjenispres/edit/{id}', 'JenispresController@edit')->name('editjenispres');
Route::post('/masterjenispres/update', 'JenispresController@update')->name('updatejenispres');

//MASTER SANKSI
Route::get('/mastersanksi', 'SanksiController@index')->name('mastersanksi');
Route::post('/mastersanksi/tambah', 'SanksiController@store')->name('tambahsanksi');
Route::get('/mastersanksi/hapus/{id}', 'SanksiController@destroy')->name('hapussanksi');
Route::get('/mastersanksi/edit/{id}', 'SanksiController@edit')->name('editsanksi');
Route::post('/mastersanksi/update', 'SanksiController@update')->name('updatesanksi');

//PELANGGARAN SISWA
Route::get('/pelsiswa','PelanggaranController@index');
Route::post('/pelsiswa/tambah','PelanggaranController@store');
Route::get('/pelsiswa/hapus/{id}', 'PelanggaranController@destroy')->name('hapuspel');
Route::get('/pelsiswa/bp/{id}','PelanggaranController@btuk');
Route::get('/pelsiswa/poin/{id}','PelanggaranController@poin');
Route::post('/pelsiswa/fetch', 'PelanggaranController@fetch')->name('fetch');
//KELAS SISWA
Route::get('/pelsiswa/findKelas','PelanggaranController@findKelas');
Route::get('/pelsiswa/findSiswa', 'PelanggaranController@findSiswa');

//PRESTASI SISWA
Route::get('/pressiswa','PrestasiController@index');
Route::post('/pressiswa/tambah','PrestasiController@store');
Route::get('/pressiswa/hapus/{id}', 'PrestasiController@destroy')->name('hapuspres');
Route::get('/pressiswa/bp/{id}','PrestasiController@btuk');
Route::get('/pressiswa/poin/{id}','PrestasiController@poin');
Route::post('/pressiswa/fetch', 'PrestasiController@fetch')->name('fetch');
Route::get('/pressiswa/findKelas','PrestasiController@findKelas');
Route::get('/pressiswa/findSiswa', 'PrestasiController@findSiswa');


//LAPORAN PELANGGARAN PERKELAS
Route::get('/laporanpelanggaran','LaporanpelanggaranController@index');
Route::get('/laporanpelanggaran/cetak','LaporanpelanggaranController@cetakpdf');


//LAPORAN PRESTASI PERKELAS
Route::get('/laporanprestasi','LaporanprestasiController@index');
Route::get('/laporanprestasi/cetak','LaporanprestasiController@cetakpdf');

//DASHBOARD
Route::get('/dashboard','DashboardTKController@index');