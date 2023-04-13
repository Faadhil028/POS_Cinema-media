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
        Schema::table('films_has_genres', function (Blueprint $table) {
            $table->foreign(['films_id'], 'fk_films_has_genres_films1')->references(['id'])->on('films')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['genres_id'], 'fk_films_has_genres_genres1')->references(['id'])->on('genres')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films_has_genres', function (Blueprint $table) {
            $table->dropForeign('fk_films_has_genres_films1');
            $table->dropForeign('fk_films_has_genres_genres1');
        });
    }
};
