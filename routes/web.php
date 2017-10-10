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

Route::get('/', 'HomeController@getIndex')->name('home');

Route::group(['prefix' => 'event-plan'], function () {
    Route::get('/', 'EventPlanController@getIndex')->name('eventPlanIndex');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'UserController@getProfile')->name('userProfile');
});
