<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('comunication_number');
            $table->integer('entry_number');
            $table->date('enter_date');
            $table->date('comunication_date');
            $table->string('annexed', 255);
            $table->string('subject', 255);
            $table->unsignedBigInteger('cod_reason');
            $table->string('observation', 255);
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_answer');
            $table->unsignedBigInteger('id_folder');
            $table->unsignedBigInteger('id_source');

            $table->foreign('id_folder')
            ->references('id')
            ->on('folders')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_status')
            ->references('id')
            ->on('status_documents')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('cod_reason')
            ->references('id')
            ->on('reasons')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_source')
            ->references('id')
            ->on('external_sources')
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
        Schema::dropIfExists('documents');
    }
}
