<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeLinkForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('social_links', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('event_plans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->change();
        });

        Schema::table('request_events', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('event_plan_id')->references('id')
                ->on('event_plans')->change();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('event_plan_details', function (Blueprint $table) {
            $table->foreign('event_plan_id')->references('id')
                ->on('event_plans')->change();
        });

        Schema::table('event_forks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('event_plan_id')->references('id')
                ->on('event_plans')->change();
        });

        Schema::table('event_fork_details', function (Blueprint $table) {
            $table->foreign('event_fork_id')->references('id')
                ->on('event_forks')->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->change();
            $table->foreign('event_plan_detail_id')->references('id')
                ->on('event_plan_details')->change();
            $table->foreign('event_fork_detail_id')->references('id')
                ->on('event_fork_details')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
