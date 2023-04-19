<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 10; $i++) { 
            Seat::create([
                'row' => 'A',
                'number' => $i,
            ]);
        }

        for ($i=1; $i <= 10; $i++) { 
            Seat::create([
                'row' => 'B',
                'number' => $i,
            ]);
        }
        
        for ($i=1; $i <= 10; $i++) { 
            Seat::create([
                'row' => 'C',
                'number' => $i,
            ]);
        }
        
        for ($i=1; $i <= 10; $i++) { 
            Seat::create([
                'row' => 'D',
                'number' => $i,
            ]);
        }

        for ($i=1; $i <= 10; $i++) { 
            Seat::create([
                'row' => 'E',
                'number' => $i,
            ]);
        }
    }
}
