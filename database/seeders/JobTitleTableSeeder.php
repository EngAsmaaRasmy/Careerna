<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_titles = [
            [
                'id' => 1,
                'name' => 'Administrative Assistant'
            ],
            [
                'id' => 2,
                'name' => 'AExecutive Assistant'
            ],
            [
                'id' => 3,
                'name' => 'Marketing Manager'
            ],
            [
                'id' => 4,
                'name' => 'Customer Service Representative'
            ],
            [
                'id' => 5,
                'name' => 'Nurse Practitioner'
            ],
            [
                'id' => 6,
                'name' => 'Software Engineer'
            ],
            [
                'id' => 7,
                'name' => 'Sales Manager'
            ],
            [
                'id' => 8,
                'name' => 'Data Entry Clerk'
            ],
            [
                'id' => 9,
                'name' => 'Office Assistant'
            ]
        ];
        JobTitle::insert($job_titles);
    }
}
