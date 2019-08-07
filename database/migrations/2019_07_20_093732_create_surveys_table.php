<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('surveys')) {
            Schema::create('surveys', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('pollID');
                $table->string('pollQuestion');
                $table->integer('pollType');
                $table->timestamps();
                $table->foreign('pollID')->references('id')->on('polls')->onDelete('cascade');
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
        Schema::dropIfExists('surveys');
    }
}
