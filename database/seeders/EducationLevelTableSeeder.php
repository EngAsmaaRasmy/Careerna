<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education_levels = [
            [
                'id' => 1,
                'name' => "Bachelor's Degree"
            ],
            [
                'id' => 2,
                'name' => "Master's Degree"
            ],
            [
                'id' => 3,
                'name' => 'Doctorate Degree
                '
            ],
            [
                'id' => 4,
                'name' => 'High School'
            ],
            [
                'id' => 5,
                'name' => 'Vocational'
            ],
            [
                'id' => 6,
                'name' => 'Diploma'
            ],
        ];
        EducationLevel::insert($education_levels);
    }
}
