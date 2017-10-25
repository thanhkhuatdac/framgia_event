<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update04EventPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_plans', function (Blueprint $table) {
            $table->renameColumn('album', 'image');
            $table->unsignedTinyInteger('active')->after('id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_plans', function (Blueprint $table) {
            $table->renameColumn('image', 'album');
            $table->dropColumn('active');
        });
    }
}
