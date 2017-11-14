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

//Auth::routes();
//Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
Route::group(['middleware' => 'visitor'], function(){
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@postRegister');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@postLogin');

    Route::get('/forgot-password', 'Auth\ForgotPasswordController@forgotPassword')->name('forgot-password');
    Route::post('/forgot-password', 'Auth\ForgotPasswordController@postForgotPassword')->name('post-forgot-password');

    Route::get('/reset/{email}/{code}', 'Auth\ForgotPasswordController@resetPassword')->name('reset-password');
    Route::post('/reset/{email}/{code}', 'Auth\ForgotPasswordController@postResetPassword');

    Route::get('/activate/{email}/{activation_code}', 'Auth\ActivationController@activate');
});
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

