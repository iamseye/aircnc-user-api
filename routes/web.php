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


Route::get('/social-auth/{service}', 'Auth\SocialAuthController@redirect');
Route::get('/social-auth/{service}/callback', 'Auth\SocialAuthController@callback');

Route::get('/verify-email/{token}', 'VerifyController@verifyEmail')->name('verify-email');
