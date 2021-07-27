<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('monty_id');
            $table->foreign('monty_id')->references('id')->on('montys');
            $table->json('behavior_matrix');
            $table->integer('wins_switched');
            $table->integer('total_switches');
            $table->integer('total_losses');
            $table->integer('total_wins');
            $table->integer('total_simulations');
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
        Schema::dropIfExists('simulations');
    }
}
