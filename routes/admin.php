<?php

/**
 * Admin Routes
 */
\Assets::add('admin_assets');

//Route::get('ajax', 'AjaxController@index')->name('ajax');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('update', 'ProfileController@update')->name('profile.update');


Route::get('users/settings/auth', 'UserSettingsController@authIndex')->name('users.settings.auth');
Route::post('users/settings/auth', 'UserSettingsController@postAuth')->name('users.settings.auth.update');
Route::get('users/settings/register', 'UserSettingsController@registerIndex')->name('users.settings.register');
Route::post('users/settings/register', 'UserSettingsController@postRegister')->name('users.settings.register.update');
Route::get('users/settings/reset', 'UserSettingsController@resetIndex')->name('users.settings.reset');
Route::post('users/settings/reset', 'UserSettingsController@postReset')->name('users.settings.reset.update');
Route::resource('users', 'UserController');

Route::resource('role', 'RoleController');

Route::resource('permissions', 'PermissionController')->except(['show']);



Route::get('settings', 'SettingsController@index')->name('settings');
