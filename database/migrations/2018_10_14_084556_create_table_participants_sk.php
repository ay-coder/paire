<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParticipantsSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->unsignedBigInteger('competition_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('competition_id')->references('id')->on('competitions');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('date_of_participant');
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
        Schema::dropIfExists('participants');
    }
}
