<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForumrepliesSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->unsignedBigInteger('forum_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('forum_id')->references('id')->on('forums');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('content');
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('dislikes')->nullable();
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
        Schema::dropIfExists('forum_replies');
    }
}
