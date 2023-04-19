<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Horror',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Drama',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Romance',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Sci-fi',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Comedy',
            'is_active' => '1']);
        Genre::create([
            'name' => 'Fantasy',
            'is_active' => '0']);
        Genre::create([
            'name' => 'Adventure',
            'is_active' => '1']);
    }
}
