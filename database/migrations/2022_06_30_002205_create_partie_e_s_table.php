<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartieESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partie_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('Etat');
            $table->string('titrep');
            $table->string('desc');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('f_id');
            $table->foreign('f_id')->references('id')->on('formations')->onDelete('cascade');
            $table->unsignedBigInteger('partie_id');
            $table->foreign('partie_id')->references('id')->on('parties')->onDelete('cascade');
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
        Schema::dropIfExists('partie_e_s');
    }
}
