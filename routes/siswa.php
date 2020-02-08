<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('siswa')->user();

    //dd($users);

    return view('siswa.home');
})->name('home');

//DASHBOARD
Route::get('/dashboardsiswa','DashboardsiswaController@index');

//LAPORAN PELANGGARAN
Route::get('/laporanpelanggaransiswa','LaporanpelsiswaController@index');

//LAPORAN PRESTASI
Route::get('/laporanprestasisiswa','LaporanpressiswaController@index');

