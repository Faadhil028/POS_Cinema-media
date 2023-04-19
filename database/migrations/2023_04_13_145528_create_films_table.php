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
        Schema::create('films', function (Blueprint $table) {
            $table->integer('id', true)->unique('id_UNIQUE')->autoIncrement();
            $table->string('title');
            $table->integer('duration');
            $table->longText('description');
            $table->string('tumbnail');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['COMING SOON', 'CURRENTLY AIRING', 'ENDED'])->default('COMING SOON');
            $table->string('genre', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};
