<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('correctanswers')) {
            Schema::create('correctanswers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('answerID');
                $table->unsignedBigInteger('pollID');
                $table->unsignedBigInter('surveyID')->nullable();
                $table->integer('correctanswer');
                $table->timestamps();
                $table->foreign('answerID')->references('id')->on('answers')->onDelete('cascade');
                $table->foreign('pollID')->references('id')->on('polls')->onDelete('cascade');
                $table->foreign('surveyID')->references('is')->on('surveys')->onDelete('cascade');
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
        Schema::dropIfExists('correctanswers');
    }
}
