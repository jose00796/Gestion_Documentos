<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdStatusToValises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('valises', function (Blueprint $table) {
            $table->unsignedBigInteger('id_status')->after('id_valise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('valises', function (Blueprint $table) {
            $table->dropColumn('id_status');
        });
    }
}
