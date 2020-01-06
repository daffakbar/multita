<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('kepalasekolah')->user();

    //dd($users);

    return view('kepalasekolah.home');
})->name('home');

