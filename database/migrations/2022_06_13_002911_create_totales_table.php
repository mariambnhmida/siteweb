<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totales', function (Blueprint $table) {
            $table->id();
            $table->string('gainformateur');
            $table->string('gainadmin');
            $table->string('commentaire');
            $table->string('etat');
            $table->string('form_id');
            $table->unsignedBigInteger('gain_id');
            $table->foreign('gain_id')->references('id')->on('gainsformateurs')->onDelete('cascade');
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
        Schema::dropIfExists('totales');
    }
}
