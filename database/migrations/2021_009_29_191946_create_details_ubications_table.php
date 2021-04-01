<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsUbicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_ubications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ubication');
            $table->string('description', 255);

            $table->foreign('id_ubication')
            ->references('id')
            ->on('ubications')
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
        Schema::dropIfExists('details_ubications');
    }
}
