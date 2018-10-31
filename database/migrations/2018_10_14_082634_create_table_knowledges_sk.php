<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKnowledgesSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->string('title');
            $table->string('featured_image');
            $table->unsignedBigInteger('milestone_id');
            $table->foreign('competition_id')->references('id')->on('milestones');
            $table->softDeletes();
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
        Schema::dropIfExists('knowledges');
    }
}
