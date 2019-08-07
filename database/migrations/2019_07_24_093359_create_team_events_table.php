<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('team_events')) {
            Schema::create('team_events', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('eventID');
                $table->string('teamName');
                $table->integer('membersNumber');
                $table->foreign('eventID')->references('id')->on('events')->onDelete('cascade');
                $table->timestamps();
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
        Schema::dropIfExists('team_events');
    }
}
