<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('bk')->user();

    //dd($users);

    return view('bk.home');
})->name('home');

// MASTER SISWA
Route::get('/mastersiswa', 'BkController@index')->name('mastersiswa');
// Route::get('/mastersiswa/export_excel', 'BkController@export_excel');
Route::post('/mastersiswa/import_excel', 'BkController@import_excel');
Route::get('/mastersiswa/hapus/{id}', 'BkController@destroy')->name('hapussiswa');
Route::get('/mastersiswa/edit/{id}', 'BkController@edit')->name('editsiswa');
Route::post('/mastersiswa/update', 'BkController@update')->name('updatesiswa');
Route::get('/mastersiswa/download', function () {
    $file = public_path()."/format_siswa.xlsx";

    $headers = array(
        'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    );

    return response()->download($file, "format_siswa.xlsx", $headers);
});

// MASTER WALI MURID
Route::get('/masterwalmur', 'WalimuridController@index')->name('masterwalmur');
Route::post('/masterwalmur/import_excel', 'WalimuridController@import_excel');
Route::get('/masterwalmur/hapus/{id}', 'WalimuridController@destroy')->name('hapuswalmur');
Route::get('/masterwalmur/edit/{id}', 'WalimuridController@edit')->name('editwalmur');
Route::post('/masterwalmur/update', 'WalimuridController@update')->name('updatewalmur');
Route::get('/masterwalmur/download', function () {
    $file = public_path()."/format_wali_murid.xlsx";

    $headers = array(
        'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    );

    return response()->download($file, "format_wali_murid.xlsx", $headers);
});

// MASTER WALI KELAS
Route::get('/masterwalikelas', 'WalikelasController@index')->name('masterwalikelas');
Route::post('/masterwalikelas/tambah', 'WalikelasController@store')->name('tambahwalikelas');
Route::get('/masterwalikelas/hapus/{id}', 'WalikelasController@destroy')->name('hapuswalikelas');
Route::get('/masterwalikelas/edit/{id}', 'WalikelasController@edit')->name('editwalikelas');
Route::post('/masterwalikelas/update', 'WalikelasController@update')->name('updatewalikelas');


// MASTER KELAS
Route::get('/masterkelas', 'KelasController@index')->name('masterkelas');
Route::post('/masterkelas/tambah', 'KelasController@store')->name('tambahkelas');
Route::get('/masterkelas/hapus/{id}', 'KelasController@destroy')->name('hapuskelas');
Route::get('/masterkelas/edit/{id}', 'KelasController@edit')->name('editkelas');
Route::post('/masterkelas/update', 'KelasController@update')->name('updatekelas');

// MASTER TAHUN AJARAN
Route::get('/mastertahunajaran', 'TahunajaranController@index')->name('mastertahunajaran');
Route::post('/mastertahunajaran/tambah', 'TahunajaranController@store')->name('tambahta');
Route::get('/mastertahunajaran/hapus/{id}', 'TahunajaranController@destroy')->name('hapusta');
Route::get('/mastertahunajaran/edit/{id}', 'TahunajaranController@edit')->name('editta');
Route::post('/mastertahunajaran/update', 'TahunajaranController@update')->name('updateta');

// MASTER KATEGORI PELANGGARAN
Route::get('/masterkategoripel', 'KategoripelController@index')->name('masterkategoripel');
Route::post('/masterkategoripel/tambah', 'KategoripelController@store')->name('tambahkatpel');
Route::get('/masterkategoripel/hapus/{id}', 'KategoripelController@destroy')->name('hapuspel');
Route::get('/masterkategoripel/edit/{id}', 'KategoripelController@edit')->name('editpel');
Route::post('/masterkategoripel/update', 'KategoripelController@update')->name('updatepel');

// MASTER KATEGORI PRESTASI
Route::get('/masterkategoripres', 'KategoripresController@index')->name('masterkategoripres');
Route::post('/masterkategoripres/tambah', 'KategoripresController@store')->name('tambahkatpres');
Route::get('/masterkategoripres/hapus/{id}', 'KategoripresController@destroy')->name('hapuspres');
Route::get('/masterkategoripres/edit/{id}', 'KategoripresController@edit')->name('editpres');
Route::post('/masterkategoripres/update', 'KategoripresController@update')->name('updatepres');

// MASTER KELAS SISWA
Route::get('/masterkelassiswa', 'KelassiswaController@index')->name('masterkelassiswa');
Route::post('/masterkelassiswa/tambah', 'KelassiswaController@store')->name('tambahkelassiswa');
Route::get('/masterkelassiswa/hapus/{id}', 'KelassiswaController@destroy')->name('hapuskelassiswa');

//DASHBOARD
Route::get('/dashboard','DashboardBKController@index');