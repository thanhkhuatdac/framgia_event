<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update04EditLinkForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('services_event_plan_detail_id_foreign');
            $table->dropForeign('services_event_fork_detail_id_foreign');
        });

        Schema::table('fork_plan_services', function (Blueprint $table) {
            $table->foreign('plan_id')->references('id')->on('event_plan_details')
                ->change();
            $table->foreign('fork_id')->references('id')->on('event_fork_details')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('event_plan_detail_id')->references('id')
                ->on('event_plan_details')->change();
            $table->foreign('event_fork_detail_id')->references('id')
                ->on('event_fork_details')->change();
        });

        Schema::table('fork_plan_services', function (Blueprint $table) {
            $table->dropForeign('fork_plan_services_plan_id_foreign');
            $table->dropForeign('fork_plan_services_fork_id_foreign');
        });
    }
}
