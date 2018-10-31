<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMilestoneCompletionSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_completions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->unsignedBigInteger('milestone_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('milestone_id')->references('id')->on('milestones');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('completion');
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
        Schema::dropIfExists('milestone_completions');
    }
}
