<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Customer;
use DB;
use Hash;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=300; $i++)
        {

         DB::table("customers")->insert([
                'first_name' => $faker->name(),
                'last_name' => $faker->name(),
                'email' =>  $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'password' => Hash::make('password'), //password
                // 'image' => $faker->image(),
                'created_at' => $faker->dateTimeBetween('-20 days', now())
            ]);

        }
    }
}
