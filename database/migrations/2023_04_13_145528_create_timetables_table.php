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
            $table->integer('id', true);
            $table->integer('film_id')->index('fk_timetable_film1_idx');
            $table->integer('studio_id')->index('fk_timetable_studio1_idx');
            $table->date('date')->nullable();
            $table->dateTime('start_time')->nullable();

            $table->primary(['id', 'film_id', 'studio_id']);
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
