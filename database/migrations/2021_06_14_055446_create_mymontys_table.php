<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMymontysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mymontys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cookie_id', 100);
            $table->string('monty', 100);
            $table->string('outcome', 100);
            $table->dateTime('date');
            $table->string('softdeletes', 100);
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
        Schema::dropIfExists('mymontys');
    }
}
