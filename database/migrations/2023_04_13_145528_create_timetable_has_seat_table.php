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
        Schema::create('timetable_has_seat', function (Blueprint $table) {
            $table->integer('timetable_id')->index('fk_seat_has_timetable_timetable1_idx');
            $table->integer('seat_id')->index('fk_seat_has_timetable_seat1_idx');
            $table->integer('studio_id')->index('fk_timetable_has_seat_studio1_idx');

            $table->primary(['timetable_id', 'seat_id', 'studio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable_has_seat');
    }
};
