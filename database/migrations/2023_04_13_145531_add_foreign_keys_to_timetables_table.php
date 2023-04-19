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
        Schema::table('timetables', function (Blueprint $table) {
            $table->foreign(['film_id'], 'fk_timetable_film1')->references(['id'])->on('films')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['studio_id'], 'fk_timetable_studio1')->references(['id'])->on('studios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timetables', function (Blueprint $table) {
            $table->dropForeign('fk_timetable_film1');
            $table->dropForeign('fk_timetable_studio1');
        });
    }
};
