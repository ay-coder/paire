<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTableSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('featured_image')->comment('Featured Image')->nullable();
            $table->string('link')->comment('Link for the tool');
            $table->longText('description');
            $table->unsignedBigInteger('milestone_id');
            $table->foreign('milestone_id')->references('id')->on('milestones');
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
        Schema::dropIfExists('tools');
    }
}
