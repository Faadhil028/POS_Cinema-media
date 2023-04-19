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
        Schema::create('studios', function (Blueprint $table) {
            $table->integer('id', true)->autoIncrement();
            $table->string('name', 45);
            $table->enum('class', ['REGULAR', 'PREMIUM'])->nullable();
            $table->tinyInteger('is_active');
            $table->integer('price');
            $table->integer('weekend_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studios');
    }
};
