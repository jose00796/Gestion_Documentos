<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('folder_name', 255);
            $table->unsignedBigInteger('id_type_folder');
            $table->unsignedBigInteger('id_source');
            $table->date('creation_date');
            $table->unsignedBigInteger('id_status_folder');
            $table->unsignedBigInteger('id_detail_ubic');
            $table->unsignedBigInteger('id_valise')->nullable();
            $table->unsignedBigInteger('id_status');

            $table->foreign('id_source')
            ->references('id')
            ->on('external_sources')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_type_folder')
            ->references('id')
            ->on('folder_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_valise')
            ->references('id')
            ->on('valises')
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
        Schema::dropIfExists('folders');
    }
}
