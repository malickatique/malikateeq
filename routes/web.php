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

Route::get('/', 'SettingsController@index');

Auth::routes();
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    // return 'DONE'; //Return anything
    return redirect (url('/'));
});

Route::post('/contact', 'SettingsController@contact')->name('contact');
Route::get('/send', 'SettingsController@send')->name('send');
Route::get('/home', 'SettingsController@dashboard')->name('home')->middleware('auth');
Route::get('/site-settings', 'SettingsController@site_settings')->name('site-settings')->middleware('auth');
Route::get('/profile-settings', 'SettingsController@profile_settings')->name('profile-settings')->middleware('auth');

Route::post('/update-profile', 'SettingsController@update_profile')->name('update-profile-settings')->middleware('auth');
Route::post('/update-site', 'SettingsController@update_site')->name('update-site-settings')->middleware('auth');
