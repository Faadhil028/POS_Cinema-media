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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('transaction_id')->index('fk_transaction_detail_transaction1_idx');
            $table->string('film', 45)->nullable();
            $table->string('studio', 45)->nullable();
            $table->string('seat', 45)->nullable();
            $table->time('start_time')->nullable();
            $table->dateTime('transaction_time')->nullable();

            $table->primary(['id', 'transaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
};
