<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table("categories")->insert([

    [
        'id'=> 1,
        'name'=> 'Animals & Pets',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
        
    ],
    [
        'id'=> 2,
        'name'=> 'Business Services',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 3,
        'name'=> 'Construction & Manufacturing',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 4,
        'name'=> 'Beauty & Well-being',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()

        
    ],
    [
        'id'=> 5,
        'name'=> 'Education & Training',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 6,
        'name'=> 'Electronics & Technology',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 7,
        'name'=> 'Events & Entertainment',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 8,
        'name'=> 'Food, Beverages & Tobacco',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 9,
        'name'=> 'Health & Medical',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 10,
        'name'=> 'Hobbies & Crafts',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 11,
        'name'=> 'Home & Garden',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 12,
        'name'=> 'Home Services',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 13,
        'name'=> 'Legal Services & Government',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 14,
        'name'=> 'Media & Publishing',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 15,
        'name'=> 'Money & Insurance',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 16,
        'name'=> 'Public & Local Services',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 17,
        'name'=> 'Restaurants & Bars',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 18,
        'name'=> 'Shopping & Fashion',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'id'=> 19,
        'name'=> 'Sports',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 20,
        'name'=> 'Travel & Vacation',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 21,
        'name'=> 'Utilities',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    [
        'id'=> 22,
        'name'=> 'Vehicles & Transportation',
        'image' =>'',
        'created_at' => now(),
        'updated_at' => now()
        
    ],
    
    
]
        );
    }
}
