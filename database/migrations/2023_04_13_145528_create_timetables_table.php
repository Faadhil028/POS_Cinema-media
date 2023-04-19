<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('film_id')->index('fk_timetable_film1_idx');
            $table->integer('studio_id')->index('fk_timetable_studio1_idx');
            $table->date('date')->nullable();
            $table->dateTime('start_time')->nullable();

            $table->foreign('film_id')->references('id')->on('films')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('studio_id')->references('id')->on('studios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
};
