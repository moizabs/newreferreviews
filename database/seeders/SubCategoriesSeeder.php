<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->delete();
        DB::table("sub_categories")->insert([

            [
                'id'=> 1,
                'category_id'=> 1,
                'name'=> 'Animal Parks & Zoo',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 2,
                'category_id'=> 1,
                'name'=> 'Cats & Dogs',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 3,
                'category_id'=> 1,
                'name'=> 'Horses & Riding',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 4,
                'category_id'=> 1,
                'name'=> 'Pet Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 5,
                'category_id'=> 1,
                'name'=> 'Pet Stores',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 2
            [
                'id'=> 6,
                'category_id'=> 2,
                'name'=> 'Administration & Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 7,
                'category_id'=> 2,
                'name'=> 'Associations & Centers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 8,
                'category_id'=> 2,
                'name'=> 'HR & Recruiting',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 9,
                'category_id'=> 2,
                'name'=> 'Import & Export',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 10,
                'category_id'=> 2,
                'name'=> 'IT & Communication',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 11,
                'category_id'=> 2,
                'name'=> 'Office Space & Supplies',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 12,
                'category_id'=> 2,
                'name'=> 'Print & Graphic Design',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 13,
                'category_id'=> 2,
                'name'=> 'Research & Development',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 14,
                'category_id'=> 2,
                'name'=> 'Sales & Marketing',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 15,
                'category_id'=> 2,
                'name'=> 'Shipping & Logistics',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 16,
                'category_id'=> 2,
                'name'=> 'Wholesale',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 3
            [
                'id'=> 17,
                'category_id'=> '3',
                'name'=> 'Architects & Engineers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 18,
                'category_id'=> '3',
                'name'=> 'Chemicals & Plastic',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 19,
                'category_id'=> '3',
                'name'=> 'Construction Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 20,
                'category_id'=> '3',
                'name'=> 'Contractors & Consultants',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 21,
                'category_id'=> '3',
                'name'=> 'Factory Equipment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 151,
                'category_id'=> '3',
                'name'=> 'Garden & Landscaping',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 22,
                'category_id'=> '3',
                'name'=> 'Industrial Supplies',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 23,
                'category_id'=> '3',
                'name'=> 'Manufacturing',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 24,
                'category_id'=> '3',
                'name'=> 'Production Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 25,
                'category_id'=> '3',
                'name'=> 'Tools & Equipment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 4
            [
                'id'=> 26,
                'category_id'=> '4',
                'name'=> 'Hair Care & Styling',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 27,
                'category_id'=> '4',
                'name'=> 'Personal Care',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 28,
                'category_id'=> '4',
                'name'=> 'Salons & Clinics',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 29,
                'category_id'=> '4',
                'name'=> 'Tattoos & Piercings',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 30,
                'category_id'=> '4',
                'name'=> 'Wellness & Spa',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 31,
                'category_id'=> '4',
                'name'=> 'Yoga & Meditation',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 5
            [
                'id'=> 32,
                'category_id'=> '5',
                'name'=> 'Colleges & Universities	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 33,
                'category_id'=> '5',
                'name'=> 'Courses & Classes',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 34,
                'category_id'=> '5',
                'name'=> 'Education Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 35,
                'category_id'=> '5',
                'name'=> 'Language Learning',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 36,
                'category_id'=> '5',
                'name'=> 'Music & Theater ',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 37,
                'category_id'=> '5',
                'name'=> 'Classes School & High School',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 38,
                'category_id'=> '5',
                'name'=> 'Specials Schools',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 39,
                'category_id'=> '5',
                'name'=> 'Vocational Training',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 6
            [
                'id'=> 40,
                'category_id'=> '6',
                'name'=> 'Appliances & Electronics',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 41,
                'category_id'=> '6',
                'name'=> 'Audio & Visual',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 42,
                'category_id'=> '6',
                'name'=> 'Computers & Phones',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 43,
                'category_id'=> '6',
                'name'=> 'Internet & Software',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 44,
                'category_id'=> '6',
                'name'=> 'Repair & Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 7
            [
                'id'=> 45,
                'category_id'=> '7',
                'name'=> 'Adult Entertainment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 46,
                'category_id'=> '7',
                'name'=> 'Children Entertainment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 47,
                'category_id'=> '7',
                'name'=> 'Clubbing & Nightlife',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 48,
                'category_id'=> '7',
                'name'=> 'Events & Venues',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 49,
                'category_id'=> '7',
                'name'=> 'Gambling',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 50,
                'category_id'=> '7',
                'name'=> 'Gaming',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 51,
                'category_id'=> '7',
                'name'=> 'Museums & Exibits',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 52,
                'category_id'=> '7',
                'name'=> 'Music & Movies',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 53,
                'category_id'=> '7',
                'name'=> 'Theater & Opera',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 54,
                'category_id'=> '7',
                'name'=> 'Wedding & Party',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 8
            [
                'id'=> 55,
                'category_id'=> '8',
                'name'=> 'Agriculture & Produce',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 56,
                'category_id'=> '8',
                'name'=> 'Asian Grocery Stores',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 57,
                'category_id'=> '8',
                'name'=> 'Bakery & Pastry',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 58,
                'category_id'=> '8',
                'name'=> 'Beer & Wine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 59,
                'category_id'=> '8',
                'name'=> 'Beverages & Liquor',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 60,
                'category_id'=> '8',
                'name'=> 'Candy & Chocolate',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 61,
                'category_id'=> '8',
                'name'=> 'Coffee & Tea',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 62,
                'category_id'=> '8',
                'name'=> 'Food Production',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 63,
                'category_id'=> '8',
                'name'=> 'Fruits & Vegetables',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 64,
                'category_id'=> '8',
                'name'=> 'Grocery Stores & Markets',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 65,
                'category_id'=> '8',
                'name'=> 'Lunch & Catering',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 9
            [
                'id'=> 66,
                'category_id'=> '9',
                'name'=> 'Clinics	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 67,
                'category_id'=> '9',
                'name'=> 'Dental Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 68,
                'category_id'=> '9',
                'name'=> 'Diagnostics & Testing',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 69,
                'category_id'=> '9',
                'name'=> 'Doctors & Surgeons',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 70,
                'category_id'=> '9',
                'name'=> 'Health Equipment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 71,
                'category_id'=> '9',
                'name'=> 'Hospital & Emergency',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 72,
                'category_id'=> '9',
                'name'=> 'Medical Specialists',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 73,
                'category_id'=> '9',
                'name'=> 'Mental Health',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 74,
                'category_id'=> '9',
                'name'=> 'Pharmacy & Medicine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 75,
                'category_id'=> '9',
                'name'=> 'Physical Aids',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 76,
                'category_id'=> '9',
                'name'=> 'Pregnancy & Children',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 10
            [
                'id'=> 77,
                'category_id'=> '10',
                'name'=> 'Art & Handicraft',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 78,
                'category_id'=> '10',
                'name'=> 'Astrology & Numerology',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 79,
                'category_id'=> '10',
                'name'=> 'Fishing & Hunting',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 80,
                'category_id'=> '10',
                'name'=> 'Hobbies Metal',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 81,
                'category_id'=> '10',
                'name'=> 'Stone & Glass Work',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 82,
                'category_id'=> '10',
                'name'=> 'Music & Instruments',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 83,
                'category_id'=> '10',
                'name'=> 'Needlework & Knitting',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 84,
                'category_id'=> '10',
                'name'=> 'Outdoor Activities',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 85,
                'category_id'=> '10',
                'name'=> 'Painting & Paper',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 11 
            [
                'id'=> 86,
                'category_id'=> '11',
                'name'=> 'Bathroom & Kitchen',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 87,
                'category_id'=> '11',
                'name'=> 'Cultural Goods',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 88,
                'category_id'=> '11',
                'name'=> 'Decoration & Interior',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 89,
                'category_id'=> '11',
                'name'=> 'Energy & Heating',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 90,
                'category_id'=> '11',
                'name'=> 'Fabric & Stationery',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 91,
                'category_id'=> '11',
                'name'=> 'Furniture Stores',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 92,
                'category_id'=> '11',
                'name'=> 'Garden & Pond',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 93,
                'category_id'=> '11',
                'name'=> 'Home & Garden Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 94,
                'category_id'=> '11',
                'name'=> 'Home Goods Stores',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 95,
                'category_id'=> '11',
                'name'=> 'Home Improvements',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 12 
            [
                'id'=> 96,
                'category_id'=> '12',
                'name'=> 'Cleaning Service Providers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 97,
                'category_id'=> '12',
                'name'=> 'Craftsman	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 98,
                'category_id'=> '12',
                'name'=> 'House Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 99,
                'category_id'=> '12',
                'name'=> 'House Sitting & Security',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 100,
                'category_id'=> '12',
                'name'=> 'Moving & Storage',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 101,
                'category_id'=> '12',
                'name'=> 'Plumbing & Sanitation',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 102,
                'category_id'=> '12',
                'name'=> 'Repair Service Providers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 13
            [
                'id'=> 104,
                'category_id'=> '13',
                'name'=> 'Customs & Toll',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 155,
                'category_id'=> '13',
                'name'=> 'Government Department',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 106,
                'category_id'=> '13',
                'name'=> 'Law Enforcement	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 108,
                'category_id'=> '13',
                'name'=> 'Lawyers & Attorneys',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 109,
                'category_id'=> '13',
                'name'=> 'Legal Service Providers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 110,
                'category_id'=> '13',
                'name'=> 'Libraries & Archives',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 160,
                'category_id'=> '13',
                'name'=> 'Municipal Department',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 161,
                'category_id'=> '13',
                'name'=> 'Registration Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 14
            [
                'id'=> 162,
                'category_id'=> '14',
                'name'=> 'Books & Magazines',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 163,
                'category_id'=> '14',
                'name'=> 'Media & Information',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 115,
                'category_id'=> '14',
                'name'=> 'Photography	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 116,
                'category_id'=> '14',
                'name'=> 'Video & Sound',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 15
            [
                'id'=> 117,
                'category_id'=> '15',
                'name'=> 'Accounting & Tax',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 118,
                'category_id'=> '15',
                'name'=> 'Banking & Money',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 179,
                'category_id'=> '15',
                'name'=> 'Credit & Debt Services',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 120,
                'category_id'=> '15',
                'name'=> 'Insurance',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 167,
                'category_id'=> '15',
                'name'=> 'Investments & Wealth',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 178,
                'category_id'=> '15',
                'name'=> 'Real Estate',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],  
            // CATEGORY 16
            [
                'id'=> 177,
                'category_id'=> '16',
                'name'=> 'Employment & Career',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 124,
                'category_id'=> '16',
                'name'=> 'Funeral & Memorial',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 125,
                'category_id'=> '16',
                'name'=> 'Housing Associations',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 180,
                'category_id'=> '16',
                'name'=> 'Kids & Family',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 172,
                'category_id'=> '16',
                'name'=> 'Military & Veteran',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 173,
                'category_id'=> '16',
                'name'=> 'Nature & Environment',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 175,
                'category_id'=> '16',
                'name'=> 'Professional Organizations',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 176,
                'category_id'=> '16',
                'name'=> 'Public Services & Welfare',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 103,
                'category_id'=> '16',
                'name'=> 'Religious Institutions',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 152,
                'category_id'=> '16',
                'name'=> 'Shelters & Homes',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 153,
                'category_id'=> '16',
                'name'=> 'Waste Management',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 17
            [
                'id'=> 154,
                'category_id'=> '17',
                'name'=> 'African & Pacific Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 105,
                'category_id'=> '17',
                'name'=> 'Bars & Cafes',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 156,
                'category_id'=> '17',
                'name'=> 'Chinese & Korean Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 107,
                'category_id'=> '17',
                'name'=> 'European Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 157,
                'category_id'=> '17',
                'name'=> 'General Restaurants',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 158,
                'category_id'=> '17',
                'name'=> 'Japanese Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 159,
                'category_id'=> '17',
                'name'=> 'Mediterranean Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 111,
                'category_id'=> '17',
                'name'=> 'Middle Eastern Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 112,
                'category_id'=> '17',
                'name'=> 'North & South American Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 113,
                'category_id'=> '17',
                'name'=> 'Southeast Asian Cuisine',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 114,
                'category_id'=> '17',
                'name'=> 'Takeaway',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 18
            [
                'id'=> 164,
                'category_id'=> '18',
                'name'=> 'Accessories',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 165,
                'category_id'=> '18',
                'name'=> 'Clothing & Underwear',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 166,
                'category_id'=> '18',
                'name'=> 'Clothing Rental & Repair',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 119,
                'category_id'=> '18',
                'name'=> 'Costume & Wedding',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 169,
                'category_id'=> '18',
                'name'=> 'Jewelry & Watches',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 121,
                'category_id'=> '18',
                'name'=> 'Malls & Marketplaces',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // CATEGORY 19
            [
                'id'=> 122,
                'category_id'=> '19',
                'name'=> 'Ball Games',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 123,
                'category_id'=> '19',
                'name'=> 'Bat-and-ball Games',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 170,
                'category_id'=> '19',
                'name'=> 'Bowls & Lawn Sports',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 171,
                'category_id'=> '19',
                'name'=> 'Dancing & Gymnastics',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 126,
                'category_id'=> '19',
                'name'=> 'Equipment & Associations',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 127,
                'category_id'=> '19',
                'name'=> 'Extreme Sports',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 128,
                'category_id'=> '19',
                'name'=> 'Fitness & Weight Lifting',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 129,
                'category_id'=> '19',
                'name'=> 'Golf & Ultimate',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 130,
                'category_id'=> '19',
                'name'=> 'Hockey & Ice Skating',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 131,
                'category_id'=> '19',
                'name'=> 'Martial arts & Wrestling',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 132,
                'category_id'=> '19',
                'name'=> 'Outdoor & Winter Sports',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Category 20
            [
                'id'=> 133,
                'category_id'=> '20',
                'name'=> 'Accommodation & Lodging	',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 134,
                'category_id'=> '20',
                'name'=> 'Activities & Tours',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 135,
                'category_id'=> '20',
                'name'=> 'Airlines & Air Travel',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 136,
                'category_id'=> '20',
                'name'=> 'Hotels',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 137,
                'category_id'=> '20',
                'name'=> 'Travel Agencies',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Category 21
            [
                'id'=> 138,
                'category_id'=> '21',
                'name'=> 'Energy & Power',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 139,
                'category_id'=> '21',
                'name'=> 'Oil & Fuel',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 140,
                'category_id'=> '21',
                'name'=> 'Water Utilities',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Category 22
            [
                'id'=> 141,
                'category_id'=> '22',
                'name'=> 'Air & Water Transport',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 142,
                'category_id'=> '22',
                'name'=> 'Airports & Parking',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 143,
                'category_id'=> '22',
                'name'=> 'Auto Parts & Wheels',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 144,
                'category_id'=> '22',
                'name'=> 'Bicycles',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 145,
                'category_id'=> '22',
                'name'=> 'Cars & Trucks',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 146,
                'category_id'=> '22',
                'name'=> 'Motorcycle & Powersports',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 147,
                'category_id'=> '22',
                'name'=> 'Other Vehicles & Trailers',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 148,
                'category_id'=> '22',
                'name'=> 'Taxis & Public Transport',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 149,
                'category_id'=> '22',
                'name'=> 'Vehicle Rental',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'=> 150,
                'category_id'=> '22',
                'name'=> 'Vehicle Repair & Fuel',
                'image' =>'',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
