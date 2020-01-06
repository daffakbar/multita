<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'bk'], function () {
  Route::get('/login', 'BkAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'BkAuth\LoginController@login');
  Route::post('/logout', 'BkAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'BkAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'BkAuth\RegisterController@register');

  Route::post('/password/email', 'BkAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'BkAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'BkAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'BkAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'timketertiban'], function () {
  Route::get('/login', 'TimketertibanAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TimketertibanAuth\LoginController@login');
  Route::post('/logout', 'TimketertibanAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TimketertibanAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'TimketertibanAuth\RegisterController@register');

  Route::post('/password/email', 'TimketertibanAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TimketertibanAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TimketertibanAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TimketertibanAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'walimurid'], function () {
  Route::get('/login', 'WalimuridAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'WalimuridAuth\LoginController@login');
  Route::post('/logout', 'WalimuridAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'WalimuridAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'WalimuridAuth\RegisterController@register');

  Route::post('/password/email', 'WalimuridAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'WalimuridAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'WalimuridAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'WalimuridAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'siswa'], function () {
  Route::get('/login', 'SiswaAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SiswaAuth\LoginController@login');
  Route::post('/logout', 'SiswaAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'SiswaAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'SiswaAuth\RegisterController@register');

  Route::post('/password/email', 'SiswaAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SiswaAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SiswaAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SiswaAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'kepalasekolah'], function () {
  Route::get('/login', 'KepalasekolahAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'KepalasekolahAuth\LoginController@login');
  Route::post('/logout', 'KepalasekolahAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'KepalasekolahAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'KepalasekolahAuth\RegisterController@register');

  Route::post('/password/email', 'KepalasekolahAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'KepalasekolahAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'KepalasekolahAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'KepalasekolahAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'walikelass'], function () {
  Route::get('/login', 'WalikelassAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'WalikelassAuth\LoginController@login');
  Route::post('/logout', 'WalikelassAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'WalikelassAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'WalikelassAuth\RegisterController@register');

  Route::post('/password/email', 'WalikelassAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'WalikelassAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'WalikelassAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'WalikelassAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'walikela'], function () {
  Route::get('/login', 'WalikelaAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'WalikelaAuth\LoginController@login');
  Route::post('/logout', 'WalikelaAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'WalikelaAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'WalikelaAuth\RegisterController@register');

  Route::post('/password/email', 'WalikelaAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'WalikelaAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'WalikelaAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'WalikelaAuth\ResetPasswordController@showResetForm');
});
