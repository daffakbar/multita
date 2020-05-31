<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('kepalasekolah')->user();

    //dd($users);

    return view('kepalasekolah.home');
})->name('home');

//DASHBOARD
Route::get('/dashboard','DashboardksController@index');

//LAPORAN PELANGGARAN PERKELAS
Route::get('/laporanpelanggaran','LaporanpelanggaranksController@index');
Route::get('/laporanpelanggaran/cetak','LaporanpelanggaranksController@cetakpdf');


//LAPORAN PRESTASI PERKELAS
Route::get('/laporanprestasi','LaporanprestasiksController@index');
Route::get('/laporanprestasi/cetak','LaporanprestasiksController@cetakpdf');