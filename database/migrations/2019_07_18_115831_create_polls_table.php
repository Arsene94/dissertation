<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('polls')) {
            Schema::create('polls', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('eventID');
                $table->unsignedBigInteger('user_id');
                $table->integer('pollType');
                $table->integer('ratingType', 1)->default('0');
                $table->string('pollQuestion');
                $table->integer('competitionTime', 1)->default('0');
                $table->integer('CompetitionPoints', 1)->default('0');
                $table->string('startPoll', 1)->default('0');
                $table->integer('liveAnswers', 1)->default('0');
                $table->integer('multipleAnswers', 1)->default('0');
                $table->timestamps();
                $table->foreign('eventID')->references('id')->on('events')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
