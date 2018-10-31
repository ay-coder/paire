<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionTableSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('competition Name');
            $table->dateTime('start')->comment('Start Date and time of Contents');
            $table->dateTime('end')->comment('End Date and time of Contents');
            $table->tinyInteger('status')->comment('0=Inactive,1=Active');
            $table->text('description')->comment('Detail required for setting up on homepage')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}
