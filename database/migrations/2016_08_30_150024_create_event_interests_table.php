<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_interests', function (Blueprint $table) {
           $table->increments('id');

           $table->integer('event_id')->unsigned();
           $table->foreign('event_id')->references('id')->on('events');

           $table->integer('interest_id')->unsigned();
           $table->foreign('interest_id')->references('id')->on('interests');

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
        Schema::drop('event_interests');
    }
}
