<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;

class films_has_genres extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::all();
        $genres = Genre::all();

        foreach ($films as $film) {
            $filmGenre = $genres->random(rand(1,3));

            foreach($filmGenre as $genre){
                $film->genres()->attach($genre->id);
            }
        }
    }
}
