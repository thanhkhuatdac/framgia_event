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
Route::get('subjects/{slug}', 'SubjectController@index')->name('allEventPlans');
Route::get('event-plans', 'EventPlanController@showAll')->name('allEvents');
Route::post('search-event-plans', 'EventPlanController@search')->name('searchEvents');
Route::get('requested-events', 'RequestEventController@showAll')->name('allRequestEvent');

Route::group(['prefix' => 'event-plan'], function () {
    Route::get('/{slug}', 'EventPlanController@getIndex')->name('eventPlanIndex');
    Route::post('add-review/{eventPlanId}', 'EventPlanController@addReview')
        ->name('addReview');
    Route::post('reply-review/{reviewId}', 'EventPlanController@addReplyReview')
        ->name('addReplyReview');
});

Route::group(['prefix' => 'request-event'], function () {
    Route::get('/{id}/{slug}', 'RequestEventController@getIndex')->name('requestEventIndex');
    Route::post('add-comment/{requestEventId}', 'RequestEventController@addComment')
        ->name('addComment');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/{id}', 'UserController@getProfile')->name('userProfile');

    Route::get('/{id}/request-events', 'UserController@getAllRequestEvents')
        ->name('userRequestEvents');
    Route::get('/{id}/event-plans', 'UserController@getAllEventPlans')
        ->name('userEventPlans');

    Route::get('redirect/{social}', 'UserController@redirect')
        ->name('socialRedirect');
    Route::get('callback/{social}', 'UserController@callback')
        ->name('socialCalllBack');

    Route::group(['prefix' => 'dashboard/{id}', 'middleware' => 'AuthUser'], function () {
        Route::get('/', 'UserController@getDashboard')->name('userDashboard');
        Route::get('edit-profile', 'UserController@getEditProfile')->name('getEditProfile');
        Route::post('edit-profile', 'UserController@postEditProfile')->name('postEditProfile');
        Route::get('change-password', 'UserController@getChangePassword')->name('getChangePassword');
        Route::post('change-password', 'UserController@postChangePassword')->name('postChangePassword');

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

            Route::get('show-demo/{slug}', 'UserController@showDemoEvent')
                ->name('showDemoEvent');

            Route::get('remove/{eventPlanId}', 'EventPlanController@getRemove')
                ->name('getRemoveEventPlan');
        });

        Route::group(['prefix' => 'request-event'], function () {
            Route::get('/', 'RequestEventController@showList')->name('listRequestEvent');

            Route::get('create-new', 'RequestEventController@getCreate')
                ->name('getCreateRequestEvent');
            Route::post('post-create-new', 'RequestEventController@postCreate')
                ->name('postCreateRequestEvent');
            Route::get('remove/{requestEventId}', 'RequestEventController@getRemove')
                ->name('getRemoveRequestEvent');
        });

        Route::group(['prefix' => 'event-fork'], function () {
            Route::get('/', 'EventForkController@showList')->name('listForkEvent');
            Route::get('remove/{eventForkId}', 'EventForkController@getRemove')
                ->name('getRemoveEventFork');
        });
    });

    Route::group(['prefix' => '{id}/fork'], function () {
        Route::get('show/{eventForkId}', 'EventForkController@showEventFork')->name('showEventFork');

        Route::get('/{eventPlanId}', 'EventForkController@forkEventPlan')
            ->name('forkEventPlan');
        Route::post('click-element', 'EventForkController@clickElement')
            ->name('forkClickElement');
        Route::post('loses-element', 'EventForkController@losesElement')
            ->name('forkLosesElement');
        Route::post('changed-data', 'EventForkController@changedData')
            ->name('forkChangedData');
        Route::post('chat', 'EventForkController@liveChat')
            ->name('forkLiveChat');

        Route::post('remove-service/{forkServiceId}', 'EventForkController@removeForkService')
            ->name('removeForkService');
        Route::post('load-fork-detail-amount/{forkDetailId}', 'EventForkController@loadForkDetailAmount')
            ->name('loadForkDetailAmount');
        Route::post('load-event-fork-amount/{eventForkId}', 'EventForkController@loadEventForkAmount')
            ->name('loadEventForkAmount');

        Route::post('add-fork-service', 'EventForkController@addForkService')
            ->name('addForkService');
    });
});
