<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('provider')->nullable()->after('remember_token');
            $table->string('provider_id')->nullable()->after('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {

            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
        });
    }
}
