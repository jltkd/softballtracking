<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtBatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_bats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('player_id');
            $table->date('date');
            $table->integer('inning');
            $table->integer('balls');
            $table->integer('strikes');
            $table->string('outcome');
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
        Schema::dropIfExists('at_bats');
    }
}
