<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('walikela')->user();

    //dd($users);

    return view('walikela.home');
})->name('home');

