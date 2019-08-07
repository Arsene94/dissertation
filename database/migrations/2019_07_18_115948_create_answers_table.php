<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('pollID');
                $table->unsignedBigInteger('surveyID')->nullable();
                $table->longText('answer');
                $table->timestamps();
                $table->foreign('pollID')->references('id')->on('polls')->onDelete('cascade');
                $table->foreign('surveyID')->references('id')->on('surveys')->onDelete('cascade');
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
        Schema::dropIfExists('answers');
    }
}
