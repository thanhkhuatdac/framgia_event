<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update01UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->after('password');
            $table->string('address')->nullable()->after('phone');
            $table->text('description')->nullable()->after('address');
            $table->string('image')->nullable()->after('description');
            $table->string('score')->default('0')->after('image');
            $table->enum('role', ['admin', 'freelancer', 'customer'])->after('score');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('score');
            $table->dropColumn('role');
            $table->dropSoftDeletes();
        });
    }
}
