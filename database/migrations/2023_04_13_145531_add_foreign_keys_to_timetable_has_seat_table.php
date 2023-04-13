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
        Schema::table('timetable_has_seat', function (Blueprint $table) {
            $table->foreign(['seat_id'], 'fk_seat_has_timetable_seat1')->references(['id'])->on('seats')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['timetable_id'], 'fk_seat_has_timetable_timetable1')->references(['id'])->on('timetables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['studio_id'], 'fk_timetable_has_seat_studio1')->references(['id'])->on('studios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timetable_has_seat', function (Blueprint $table) {
            $table->dropForeign('fk_seat_has_timetable_seat1');
            $table->dropForeign('fk_seat_has_timetable_timetable1');
            $table->dropForeign('fk_timetable_has_seat_studio1');
        });
    }
};
