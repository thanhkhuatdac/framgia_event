<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update07EditForkPlanServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fork_plan_services', function (Blueprint $table) {
            $table->renameColumn('plan_id', 'event_plan_detail_id');
            $table->renameColumn('fork_id', 'event_fork_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fork_plan_services', function (Blueprint $table) {
            $table->renameColumn('event_plan_detail_id', 'plan_id');
            $table->renameColumn('event_fork_detail_id', 'fork_id');
        });
    }
}
