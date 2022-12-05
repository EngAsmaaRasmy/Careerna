<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_types = [
            [
                'id' => 1,
                'name' => 'Full Time'
            ],
            [
                'id' => 2,
                'name' => 'Part Time'
            ],
            [
                'id' => 3,
                'name' => 'Freelance'
            ],
            [
                'id' => 4,
                'name' => 'Internship'
            ],
            [
                'id' => 5,
                'name' => 'Work from home'
            ],
            [
                'id' => 6,
                'name' => 'Student Activity'
            ],
            [
                'id' => 7,
                'name' => 'Volunteering'
            ],
        ];
        JobType::insert($job_types);
    }
}
