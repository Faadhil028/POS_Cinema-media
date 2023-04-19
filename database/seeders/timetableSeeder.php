<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timetable;

class timetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timetable::create([
            'film_id' => '1',
            'studio_id' => '1',
            'date' => '2023-08-21',
            'start_time' => '2023-08-21 10:00:00',
        ]);
        Timetable::create([
            'film_id' => '1',
            'studio_id' => '1',
            'date' => '2023-08-21',
            'start_time' => '2023-08-21 14:00:00',
        ]);
        Timetable::create([
            'film_id' => '2',
            'studio_id' => '2',
            'date' => '2023-06-15',
            'start_time' => '2023-06-15 10:00:00',
        ]);
        Timetable::create([
            'film_id' => '2',
            'studio_id' => '2',
            'date' => '2023-06-15',
            'start_time' => '2023-06-15 14:00:00',
        ]);
        Timetable::create([
            'film_id' => '3',
            'studio_id' => '3',
            'date' => '2023-06-09',
            'start_time' => '2023-06-09 10:00:00',
        ]);
        Timetable::create([
            'film_id' => '3',
            'studio_id' => '3',
            'date' => '2023-06-09',
            'start_time' => '2023-06-09 14:00:00',
        ]);
    }
}
