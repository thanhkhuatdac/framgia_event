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
Auth::routes();

Route::get('/', 'HomeController@getIndex')->name('home');

Route::group(['prefix' => 'event-plan'], function () {
    Route::get('/', 'EventPlanController@getIndex')->name('eventPlanIndex');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@getProfile')->name('userProfile');
    Route::get('redirect/{social}', 'UserController@redirect')
        ->name('socialRedirect');
    Route::get('callback/{social}', 'UserController@callback')
        ->name('socialCalllBack');
    Route::group(['prefix' => 'dashboard', 'middleware' => 'AuthUser'], function () {
        Route::get('/', 'UserController@getDashboard')->name('userDashboard');
    });
});
