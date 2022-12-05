<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Accounting/Finance'
            ],
            [
                'id' => 2,
                'name' => 'Administration'
            ],
            [
                'id' => 3,
                'name' => 'Analyst/Research
                '
            ],
            [
                'id' => 4,
                'name' => 'Banking'
            ],
            [
                'id' => 5,
                'name' => 'Business development'
            ],
            [
                'id' => 6,
                'name' => 'C-Level Executive/GM/Director'
            ],
            [
                'id' => 7,
                'name' => 'Creative/Design/Art'
            ],
            [
                'id' => 8,
                'name' => 'Customer services/Support'
            ],
            [
                'id' => 9,
                'name' => 'Education/Teaching'
            ],
            [
                'id' => 10,
                'name' => 'Engineering – Construction/Civil/Architecture'
            ],
            [
                'id' => 11,
                'name' => 'Engineering – Mechanical/Electrical'
            ],
            [
                'id' => 12,
                'name' => 'Engineering – Mechanical/Electrical'
            ],
            [
                'id' => 13,
                'name' => 'Engineering – Oil & Gas/Energy'
            ],
            [
                'id' => 14,
                'name' => 'Engineering – Other'
            ],
            [
                'id' => 15,
                'name' => 'Engineering – Telecom/Technology'
            ],
            [
                'id' => 16,
                'name' => 'Fashion'
            ],
            [
                'id' => 17,
                'name' => 'Hospitality/Hotels/Food services'
            ],
            [
                'id' => 18,
                'name' => 'Human Resources'
            ],
            [
                'id' => 19,
                'name' => 'IT/Software Development'
            ],
            [
                'id' => 20,
                'name' => 'Installation/Maintenance/Repair'
            ],
            [
                'id' => 21,
                'name' => 'Legal'
            ],
            [
                'id' => 22,
                'name' => 'Logistics/Supply Chain'
            ],
            [
                'id' => 23,
                'name' => 'Manufacturing/Production'
            ],
            [
                'id' => 24,
                'name' => 'Marketing/PR/Advertising'
            ],
            [
                'id' => 25,
                'name' => 'Media/Journalism/Publishing'
            ],
            [
                'id' => 26,
                'name' => 'Medical/Healthcare'
            ],
            [
                'id' => 27,
                'name' => 'Operations/Management'
            ],
            [
                'id' => 28,
                'name' => 'Pharmaceutical'
            ],
            [
                'id' => 29,
                'name' => 'Project/Program Management'
            ],
            [
                'id' => 30,
                'name' => 'Purchasing/Procurement'
            ],
            [
                'id' => 31,
                'name' => 'Quality '
            ],
            [
                'id' => 32,
                'name' => 'R&D/Science'
            ],
            [
                'id' => 33,
                'name' => 'Sales/Retail'
            ],
            [
                'id' => 34,
                'name' => 'Sports and Leisure'
            ],
            [
                'id' => 35,
                'name' => 'Tourism/Travel'
            ],
            [
                'id' => 36,
                'name' => 'Training/Instructor'
            ],
            [
                'id' => 37,
                'name' => 'Writing/Editorial'
            ],
        ];
        Category::insert($categories);
    }
}
