<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            'title' => 'The 355',
            'duration' => '125',
            'description' => 'The 355 akan menceritakan kisah agen CIA yang bergabung dengan pasukan tiga agen internasional untuk menjalankan misi di laut. 
                            Mereka ditugaskan untuk mendapatkan kembali senjata rahasia yang jatuh ke tangan tentara bayaran. Selain itu, mereka juga harus bisa lebih pintar 
                            berstrategi dari seorang wanita misterius yang menelusuri setiap langkah agen ini.',
            'tumbnail' => 'https://www.imdb.com/title/tt8356942/mediaviewer/rm1754265345/?ref_=tt_ov_i',
            'start_date' => date('2023-08-21'),
            'end_date' => date('2023-09-21'),
            'status' => 'COMING SOON',
            'genre' => 'Action',
        ]);

        Film::create([
            'title' => 'Morbius',
            'duration' => '140',
            'description' => 'Morbius, film superhero yang dibuat dari komik milik Marvel ini sudah ditunggu oleh banyak penggemar sejak awal rilis trailer. 
            Morbius akan mengisahkan Michael Morbius yang mengidap penyakit aneh.',
            'tumbnail' => 'https://www.imdb.com/title/tt5108870/mediaviewer/rm2505970177/?ref_=tt_ov_i',
            'start_date' => date('2023-06-15'),
            'end_date' => date('2023-07-15'),
            'status' => 'COMING SOON',
            'genre' => 'Action,Horror',
        ]);

        Film::create([
            'title' => 'Uncharted',
            'duration' => '130',
            'description' => 'Uncharted diangkat dari salah satu serial video game yang sangat laris sepanjang masa. 
            Film ini akan membawa Anda ke sebuah cerita tokoh Nathan Drake yang melakukan petualangan perburuan harta 
            karun pertamanya dengan temannya Victor "Sully" Sullivan.',
            'tumbnail' => 'https://www.imdb.com/title/tt1464335/mediaviewer/rm180740097/?ref_=tt_ov_i',
            'start_date' => date('2023-06-09'),
            'end_date' => date('2023-07-09'),
            'status' => 'COMING SOON',
            'genre' => 'Action,Adventure',
        ]);
    }
}

