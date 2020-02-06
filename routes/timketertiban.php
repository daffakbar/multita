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
Route::post('/pelsiswa/fetch', 'PelanggaranController@fetch')->name('fetch');

//PRESTASI SISWA
Route::get('/pressiswa','PrestasiController@index');
Route::post('/pressiswa/tambah','PrestasiController@store');
Route::get('/pressiswa/hapus/{id}', 'PrestasiController@destroy')->name('hapuspres');

//LAPORAN PELANGGARAN PERKELAS
Route::get('/laporanpelanggaran','LaporanpelanggaranController@index');
Route::get('/laporanpelanggaran/cetak','LaporanpelanggaranController@cetakpdf');


//LAPORAN PRESTASI PERKELAS
Route::get('/laporanprestasi','LaporanprestasiController@index');

//DASHBOARD
Route::get('/dashboard','DashboardTKController@index');