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
        Schema::create('timetable_has_transaction', function (Blueprint $table) {
            $table->integer('timetable_id')->index('fk_timetable_has_seat1_timetable1_idx');
            $table->integer('seat_id')->index('fk_timetable_has_seat1_seat1_idx');
            $table->integer('transaction_id')->index('fk_timetable_has_seat1_transaction1_idx');

            $table->primary(['timetable_id', 'seat_id', 'transaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable_has_transaction');
    }
};
