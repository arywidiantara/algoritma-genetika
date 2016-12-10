<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('teachs_id')->unsigned();
            $table->integer('days_id')->unsigned();
            $table->integer('times_id')->unsigned();
            $table->integer('rooms_id')->unsigned();
            $table->timestamps();

            $table->foreign('teachs_id')->references('id')->on('teachs');
            $table->foreign('days_id')->references('id')->on('days');
            $table->foreign('times_id')->references('id')->on('times');
            $table->foreign('rooms_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
