<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('cookie_id');
            $table->foreign('cookie_id')->references('id')->on('cookies');
            $table->unsignedInteger('monty_id');
            $table->foreign('monty_id')->references('id')->on('montys');
            $table->boolean('outcome');
            $table->integer('door_picked');
            $table->integer('door_opened');
            $table->integer('door_car');
            $table->integer('door_switched')->nullable();
            $table->json('details')->nullable();
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
        Schema::dropIfExists('games');
    }
}
