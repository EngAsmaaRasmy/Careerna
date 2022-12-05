<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            [
                'id' => 1,
                'name' => 'Accounting and Auditing Service'
            ],
            [
                'id' => 2,
                'name' => 'Marketing and Advertising'
            ],
            [
                'id' => 3,
                'name' => 'Aerospace and Defense'
            ],
            [
                'id' => 4,
                'name' => 'Agriculture/Fishing/Farming'
            ],
            [
                'id' => 5,
                'name' => 'Airline/Aviation'
            ],
            [
                'id' => 6,
                'name' => 'Alternative Medicine'
            ],
            [
                'id' => 7,
                'name' => 'Animation'
            ],
            [
                'id' => 8,
                'name' => 'Apparel and Fashion'
            ],
            [
                'id' => 9,
                'name' => 'Architectural and Design Services'
            ],
            [
                'id' => 10,
                'name' => 'Arts and craft'
            ],
            [
                'id' => 11,
                'name' => 'Automotive'
            ],
            [
                'id' => 12,
                'name' => 'Banking'
            ],
            [
                'id' => 13,
                'name' => 'Biotechnology'
            ],
            [
                'id' => 14,
                'name' => 'Broadcasting and Film'
            ],
            [
                'id' => 15,
                'name' => 'Business services – Others'
            ],
            [
                'id' => 16,
                'name' => 'Business Supplies and Equipment'
            ],
            [
                'id' => 17,
                'name' => 'Capital Markets'
            ],
            [
                'id' => 18,
                'name' => 'Chemicals'
            ],
            [
                'id' => 19,
                'name' => 'Textile and Clothing'
            ],
            [
                'id' => 20,
                'name' => 'Computer and Network Security'
            ],
            [
                'id' => 21,
                'name' => 'Computer – Hardware'
            ],
            [
                'id' => 22,
                'name' => 'Computer – Software'
            ],
            [
                'id' => 23,
                'name' => 'Information Technology services'
            ],
            [
                'id' => 24,
                'name' => 'Construction'
            ],
            [
                'id' => 25,
                'name' => 'Consumer Electronics'
            ],
            [
                'id' => 26,
                'name' => 'FMCG'
            ],
            [
                'id' => 27,
                'name' => 'Cosmetics'
            ],
            [
                'id' => 28,
                'name' => 'Dairy'
            ],
            [
                'id' => 29,
                'name' => 'Energy and Utilities'
            ],
            [
                'id' => 30,
                'name' => 'Engineering Services'
            ],
            [
                'id' => 31,
                'name' => 'Entertainment '
            ],
            [
                'id' => 32,
                'name' => 'Environmental Services'
            ],
            [
                'id' => 33,
                'name' => 'Financial Services'
            ],
            [
                'id' => 34,
                'name' => 'Fine Art'
            ],
            [
                'id' => 35,
                'name' => 'Food and beverage'
            ],
            [
                'id' => 36,
                'name' => 'Furniture'
            ],
            [
                'id' => 37,
                'name' => 'Government'
            ],
            [
                'id' => 38,
                'name' => 'Health, Wellness and Fitness'
            ],
            [
                'id' => 39,
                'name' => 'Healthcare and Medical Services'
            ],
            [
                'id' => 40,
                'name' => 'Higher Education'
            ],
            [
                'id' => 41,
                'name' => 'Hospitality/Hotels'
            ],
            [
                'id' => 42,
                'name' => 'Import & Export'
            ],
            [
                'id' => 43,
                'name' => 'Insurance'
            ],
            [
                'id' => 44,
                'name' => 'Internet/E-commerce'
            ],
            [
                'id' => 45,
                'name' => 'Law Enforcement'
            ],
            [
                'id' => 46,
                'name' => 'Legal Services'
            ],
            [
                'id' => 47,
                'name' => 'Logistics and Supply chain '
            ],
            [
                'id' => 48,
                'name' => 'Luxury Goods and Jewelry'
            ],
            [
                'id' => 49,
                'name' => 'Management Consulting'
            ],
            [
                'id' => 50,
                'name' => 'Manufacturing'
            ],
            [
                'id' => 51,
                'name' => 'Market Research'
            ],
            [
                'id' => 52,
                'name' => 'Media Production'
            ],
            [
                'id' => 53,
                'name' => 'Medical Devices and Supplies'
            ],
            [
                'id' => 54,
                'name' => 'Mining and Metals'
            ],
            [
                'id' => 55,
                'name' => 'Non-profit organization'
            ],
            [
                'id' => 56,
                'name' => 'Oil and Gas'
            ],
            [
                'id' => 57,
                'name' => 'Packaging '
            ],
            [
                'id' => 58,
                'name' => 'Personal Care and Services'
            ],
            [
                'id' => 59,
                'name' => 'Pharmaceutical'
            ],
            [
                'id' => 60,
                'name' => 'Photography'
            ],
            [
                'id' => 61,
                'name' => 'Plastics'
            ],
            [
                'id' => 62,
                'name' => 'Education'
            ],
            [
                'id' => 63,
                'name' => 'Publishing & Printing'
            ],
            [
                'id' => 64,
                'name' => 'Training and Coaching'
            ],
            [
                'id' => 65,
                'name' => 'Food Services/Restaurants/Catering'
            ],
            [
                'id' => 66,
                'name' => 'Retail '
            ],
            [
                'id' => 67,
                'name' => 'Security and Surveillance'
            ],
            [
                'id' => 68,
                'name' => 'Sports'
            ],
            [
                'id' => 69,
                'name' => 'Recruitment and Staffing'
            ],
            [
                'id' => 70,
                'name' => 'Supermarkets'
            ],
            [
                'id' => 71,
                'name' => 'Telecommunication'
            ],
            [
                'id' => 72,
                'name' => 'Travel and Tourism'
            ],
            [
                'id' => 73,
                'name' => 'Venture Capital and Private Equity'
            ],
            [
                'id' => 74,
                'name' => 'Warehousing'
            ],
            [
                'id' => 75,
                'name' => 'Waste Management'
            ],
            [
                'id' => 76,
                'name' => 'Writing and Editing'
            ],
            [
                'id' => 77,
                'name' => 'E-Learning'
            ],
            [
                'id' => 78,
                'name' => 'Investment Banking'
            ],
            [
                'id' => 79,
                'name' => 'Journalism'
            ],
            [
                'id' => 80,
                'name' => 'Youth and Volunteering'
            ],
        ];
        Industry::insert($industries);
    }
}
