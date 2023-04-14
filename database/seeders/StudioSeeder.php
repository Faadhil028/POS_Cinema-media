<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studio;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studio::create([
            'name' => 'Studio 1',
            'class' => 'REGULAR', 
            'is_active' => '1',
            'price' => '20000',
            'weekend_price' => '30000']);
        Studio::create([
            'name' => 'Studio 2',
            'class' => 'REGULAR', 
            'is_active' => '1',
            'price' => '20000',
            'weekend_price' => '30000']);
        Studio::create([
            'name' => 'Studio 3',
            'class' => 'PREMIUM', 
            'is_active' => '1',
            'price' => '40000',
            'weekend_price' => '40000']);
    }
}
