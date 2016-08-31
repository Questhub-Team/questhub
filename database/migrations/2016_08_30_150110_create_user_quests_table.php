<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quests', function (Blueprint $table) {
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');

           $table->integer('event_id')->unsigned();
           $table->foreign('event_id')->references('id')->on('events');

           $table->boolean('completed');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_quests');
    }
}

