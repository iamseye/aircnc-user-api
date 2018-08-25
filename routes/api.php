<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');
Route::post('send-verification-email', 'VerifyController@sendVerificationEmail');
Route::post('send-mobile-verification-code', 'VerifyController@sendMobileVerificationCode');
Route::post('verify-mobile', 'VerifyController@verifyMobile');


Route::post('password/email', 'Auth\ForgotPasswordController@sendResetPasswordEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::post('placeorder', 'PaymentControllunauthenticateder@placeOrder');

Route::get('sellcars', 'SellCarController@index')->name('sellcar.index');
Route::get('sellcars/{id}', 'SellCarController@show')->name('sellcar.show');
Route::post('search-sellcars', 'SearchController@searchSellCar')->name('searchSellCar');
Route::get('getInitialInfo', 'InitialController@getInitialInfo')->name('init.getInitialInfo');
Route::post('get-brand-options', 'SearchController@getBrandOptions')->name('search.getSeries');
Route::post('get-promo-code-price', 'RentOrderController@getPromoCodePrice')->name('rentOrder.getPromoCodePrice');

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('user/{id}', 'UserController@update')->name('user.update');
    Route::post('upload-verify-photo/{id}', 'UserController@uploadVerifyPhoto')->name('user.uploadVerifyPhoto');
    Route::post('create-rent-order', 'RentOrderController@store')->name('rentOrder.store');
    Route::post('extend-rent-order', 'RentOrderController@extendRentOrder')->name('rentOrder.extendRentOrder');
    Route::post('user-cancel-order', 'RentOrderController@userCancelOrder')->name('rentOrder.userCancelOrder');
    Route::post('get-payment-detail', 'RentOrderController@getPaymentDetail')->name('rentOrder.getPaymentDetail');
    Route::post('complete-order', 'RentOrderController@completeOrder')->name('rentOrder.completeOrder');
    Route::post('car-unavailable', 'SellCarController@setCarUnavailable')->name('sellCarUnavailable.store');
    Route::post('add-review', 'ReviewController@store')->name('review.store');
    Route::post('get-auth-user', 'UserController@getAuthUser')->name('user.getAuthUser');
    Route::post('pay-by-prime', 'payController@payByPrime')->name('pay.payByPrime');
    Route::post('pay-by-token', 'payController@payByToken')->name('pay.payByToken');
});
