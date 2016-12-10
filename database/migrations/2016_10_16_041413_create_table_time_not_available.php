<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTimeNotAvailable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_not_available', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('lecturers_id')->unsigned()->nullable();
            $table->integer('days_id')->unsigned()->nullable();
            $table->integer('times_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('lecturers_id')->references('id')->on('lecturers')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('days_id')->references('id')->on('days')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('times_id')->references('id')->on('times')->OnUpdate('CASCADE')->OnDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('time_not_available');
    }
}
