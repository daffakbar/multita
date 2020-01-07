<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('walimurid')->user();

    //dd($users);

    return view('walimurid.home');
})->name('home');

//DASHBOARD

//LAPORAN PELANGGARAN
Route::get('/laporanpelanggaran', function () {
	return view('siswa/laporanpelanggaran/index');
});

//LAPORAN PRESTASI
Route::get('/laporanprestasi', function () {
	return view('siswa/laporanprestasi/index');
});