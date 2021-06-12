<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_document');
            $table->unsignedBigInteger('id_status_document');
            $table->unsignedBigInteger('id_folder');
            $table->unsignedBigInteger('id_valise');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_document')
            ->references('id')
            ->on('documents')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_status_document')
            ->references('id')
            ->on('status_documents')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_folder')
            ->references('id')
            ->on('folders')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_valise')
            ->references('id')
            ->on('valises')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_user')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('tracing');
    }
}
