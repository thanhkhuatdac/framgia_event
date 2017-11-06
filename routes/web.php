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
    Route::get('/{slug}', 'EventPlanController@getIndex')->name('eventPlanIndex');
    Route::post('add-review/{eventPlanId}', 'EventPlanController@addReview')
        ->name('addReview');
    Route::post('reply-review/{reviewId}', 'EventPlanController@addReplyReview')
        ->name('addReplyReview');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/{id}', 'UserController@getProfile')->name('userProfile');
    Route::get('redirect/{social}', 'UserController@redirect')
        ->name('socialRedirect');
    Route::get('callback/{social}', 'UserController@callback')
        ->name('socialCalllBack');

    Route::group(['prefix' => 'dashboard/{id}', 'middleware' => 'AuthUser'], function () {
        Route::get('/', 'UserController@getDashboard')->name('userDashboard');

        Route::group(['prefix' => 'event'], function () {
            Route::get('/', 'UserController@getDashboardEvents')
                ->name('userDashboardEvents');

            Route::get('load-categories', 'UserController@getLoadCategories')
                ->name('userDashboardLoadCategories');

            Route::get('create-new', 'UserController@getDashboardCreateEvent')
                ->name('userDashboardCreateNewEvent');
            Route::post('post-create-new', 'UserController@postDashboardCreateEvent')
                ->name('userDashboardPostCreateNewEvent');

            Route::get('create-detail/{slug}/', 'UserController@getCreateEventDetail')
                ->name('userDashboardCreateEventDetail');
            Route::post('post-create-detail', 'UserController@postCreateEventDetail')
                ->name('userDashboardPostCreateEventDetail');

            Route::get('create-service', 'UserController@getCreateEventService')
                ->name('userDashboardCreateEventService');
            Route::post('post-create-service', 'UserController@postCreateEventService')
                ->name('userDashboardPostCreateEventService');
        });
    });
});
