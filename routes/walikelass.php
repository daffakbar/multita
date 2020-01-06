<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('walikelass')->user();

    //dd($users);

    return view('walikelass.home');
})->name('home');

