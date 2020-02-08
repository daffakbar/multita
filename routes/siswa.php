<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('siswa')->user();

    //dd($users);

    return view('siswa.home');
})->name('home');

//DASHBOARD

//LAPORAN PELANGGARAN
// Route::get('/laporanpelanggaran', function () {
// });
Route::get('/laporanpelanggaransiswa','LaporanpelsiswaController@index');
// Route::get('/laporanpelang', 'LaporanpelsiswaController@index')->name('laporanpelsiswa');

//LAPORAN PRESTASI
// Route::get('/laporanprestasi', function () {
//     
// });
Route::get('/laporanprestasisiswa','LaporanpressiswaController@index');
// Route::get('/laporanprestasi', 'LaporanpressiswaController@index')->name('laporanpressiswa');

