<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create.film']);
        Permission::create(['name' => 'create.genre']);
        Permission::create(['name' => 'create.timetable']);
        Permission::create(['name' => 'create.studio']);
        Permission::create(['name' => 'create.seat']);
        Permission::create(['name' => 'create.transaction']);

        Permission::create(['name' => 'read.film']);
        Permission::create(['name' => 'read.genre']);
        Permission::create(['name' => 'read.timetable']);
        Permission::create(['name' => 'read.studio']);
        Permission::create(['name' => 'read.seat']);
        Permission::create(['name' => 'read.transaction']);

        Permission::create(['name' => 'update.film']);
        Permission::create(['name' => 'update.genre']);
        Permission::create(['name' => 'update.timetable']);
        Permission::create(['name' => 'update.studio']);
        Permission::create(['name' => 'update.seat']);

        Permission::create(['name' => 'delete.film']);
        Permission::create(['name' => 'delete.genre']);
        Permission::create(['name' => 'delete.timetable']);
        Permission::create(['name' => 'delete.studio']);
        Permission::create(['name' => 'delete.seat']);

    }
}
