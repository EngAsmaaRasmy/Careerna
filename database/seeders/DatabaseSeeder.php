<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CareerLevelTableSeeder::class,
            CategoryTableSeeder::class,
            EducationLevelTableSeeder::class,
            JobTitleTableSeeder::class,
            JobTypeTableSeeder::class,
            IndustryTableSeeder::class,
        ]);
    }
}
