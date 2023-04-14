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
        Schema::create('films_has_genres', function (Blueprint $table) {
            $table->integer('films_id')->index('fk_films_has_genres_films1_idx');
            $table->integer('genres_id')->index('fk_films_has_genres_genres1_idx');

            $table->primary(['films_id', 'genres_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_has_genres');
    }
};
