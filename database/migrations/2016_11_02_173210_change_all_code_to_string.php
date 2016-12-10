<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAllCodeToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table)
        {
            $table->string('code_courses')->change();
        });
        Schema::table('days', function (Blueprint $table)
        {
            $table->string('code_days')->change();
        });
        Schema::table('lecturers', function (Blueprint $table)
        {
            $table->string('code_lecturers')->change();
        });
        Schema::table('rooms', function (Blueprint $table)
        {
            $table->string('code_rooms')->change();
        });
        Schema::table('timedays', function (Blueprint $table)
        {
            $table->string('code_timedays')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table)
        {
            $table->integer('code_courses')->change();
        });
        Schema::table('days', function (Blueprint $table)
        {
            $table->integer('code_days')->change();
        });
        Schema::table('lecturers', function (Blueprint $table)
        {
            $table->integer('code_lecturers')->change();
        });
        Schema::table('rooms', function (Blueprint $table)
        {
            $table->integer('code_rooms')->change();
        });
        Schema::table('timedays', function (Blueprint $table)
        {
            $table->integer('code_timedays')->change();
        });
    }
}
