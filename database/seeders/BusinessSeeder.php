<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;
use DB;
use Hash;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Business::factory(100)->create();
        // factory(Business::class, 100)->create();
        $faker = \Faker\Factory::create();
        for($i=0; $i<=300; $i++)
        {
            DB::table("businesses")->insert([
                'name' => $faker->name(),
                'comp_name' => $faker->name(),
                'mc_num' => $faker->numberBetween(10000, 999999),
                'email' =>  $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'address' => $faker->address(),
                'location' => $faker->address(),
                'desire_name' => $faker->name(),
                'password' => Hash::make('password'), //password
                // 'image' => $faker->image(),
                'message' => 'This is message',
                'website' => 'http://'.$faker->name(5).'.com',
                'created_at' => $faker->dateTimeBetween('-20 days', now())
            ]);
        }
    }
}
