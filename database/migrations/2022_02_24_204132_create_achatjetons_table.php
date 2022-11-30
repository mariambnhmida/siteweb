<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatjetonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achatjetons', function (Blueprint $table) {
           

   $table->id();
   $table->string('prix');
   $table->unsignedBigInteger('user_id');
   $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
   $table->unsignedBigInteger('abonnement_id');
   $table->foreign('abonnement_id')->references('id')->on('abonnements')->onDelete('cascade');

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
        Schema::dropIfExists('achatjetons');
    }
}
