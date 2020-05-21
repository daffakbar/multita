<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('walimurid')->user();

    //dd($users);

    return view('walimurid.home');
})->name('home');

//DASHBOARD
Route::get('/dashboardsiswa','DashboardsiswaController@index');

//LAPORAN PELANGGARAN
Route::get('/laporanpelanggaransiswa','LaporanpelsiswaController@index');

//LAPORAN PRESTASI
Route::get('/laporanprestasisiswa','LaporanpressiswaController@index');

