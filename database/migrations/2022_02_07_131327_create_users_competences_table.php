<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_competences', function (Blueprint $table) {
            $table->id();
            $table->string('niv');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('cats')->onDelete('cascade');
            $table->unsignedBigInteger('scat_id');
            $table->foreign('scat_id')->references('id')->on('cats')->onDelete('cascade');
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
        Schema::dropIfExists('users_competences');
    }
}
