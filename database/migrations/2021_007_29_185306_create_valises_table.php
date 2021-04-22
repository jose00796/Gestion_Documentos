<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valises', function (Blueprint $table) {
            $table->id();
            $table->string('valise_name', 255);
            $table->unsignedBigInteger('id_valise_type');
            $table->unsignedBigInteger('id_location');
            $table->date('creation_date');
            $table->unsignedBigInteger('id_detail_ubic');

            $table->foreign('id_valise_type')
            ->references('id')
            ->on('valise_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_detail_ubic')
            ->references('id')
            ->on('details_ubications')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valises');
    }
}
