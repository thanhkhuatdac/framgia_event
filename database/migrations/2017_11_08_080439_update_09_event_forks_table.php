<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update09EventForksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_forks', function($table) {
            $table->string('slug')->after('id');
            $table->unsignedInteger('amount')->after('status');
            $table->dateTime('start_date')->nullable()->change();
            $table->dateTime('due_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_forks', function($table) {
            $table->dropColumn('slug');
            $table->dropColumn('amount');
            $table->dateTime('start_date')->change();
            $table->dateTime('due_date')->change();
        });
    }
}
