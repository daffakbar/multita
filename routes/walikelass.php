<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('walikelass')->user();

    //dd($users);

    return view('walikelass.home');
})->name('home');

//DASHBOARD
Route::get('/dashboard','DashboardwkController@index');

//LAPORAN PELANGGARAN PERKELAS
Route::get('/laporanpelanggaran','LaporanpelanggaranwkController@index');
Route::get('/laporanpelanggaran/cetak','LaporanpelanggaranwkController@cetakpdf');


//LAPORAN PRESTASI PERKELAS
Route::get('/laporanprestasi','LaporanprestasiwkController@index');
Route::get('/laporanprestasi/cetak','LaporanprestasiwkController@cetakpdf');