<?php

namespace Database\Seeders;

use App\Models\CareerLevel;
use Illuminate\Database\Seeder;

class CareerLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $career_levels = [
            [
                'id' => 1,
                'name' => 'Student'
            ],
            [
                'id' => 2,
                'name' => 'Entry Level'
            ],
            [
                'id' => 3,
                'name' => 'Experienced'
            ],
            [
                'id' => 4,
                'name' => 'Manger'
            ],
            [
                'id' => 5,
                'name' => 'Senior Management'
            ]
        ];
        CareerLevel::insert($career_levels);
    }
}
