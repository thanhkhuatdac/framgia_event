<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Subject;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'reviews' => 'App\Models\Review',
            'request_events' => 'App\Models\RequestEvent',
        ]);

        view()->composer(['front.main_layouts.header_menu'], function($view){
            $subjects = Subject::getAllSubjects();
            $view->with([
                'subjects' => $subjects
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
