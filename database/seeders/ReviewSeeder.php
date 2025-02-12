<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use DB;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=100; $i++)
        {
            DB::table("reviews")->insert([
                'user_id' => $faker->numberBetween(1, 100),
                'comp_id' => $faker->numberBetween(1,50),
                'title' => $faker->name(),
                'review' => $faker->paragraph(),
                'rating' => $faker->numberBetween(1, 5),

                // 'mc_num' => $faker->numberBetween(10000, 999999),
                // 'email' =>  $faker->unique()->safeEmail(),
                // 'phone' => $faker->phoneNumber(),
                // 'city' => $faker->city(),
                // 'state' => $faker->state(),
                // 'address' => $faker->address(),
                // 'location' => $faker->address(),
                // 'desire_name' => $faker->name(),
                // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                // // 'image' => $faker->image(),
                // 'message' => 'This is message',
                // 'website' => 'http://'.$faker->name(5).'.com',
                // 'user_id' => $faker->numberBetween(1, 50),
                // 'comp_id' => $faker->numberBetween(1,100),
                // 'title' => $faker->title(),
                // 'review' =>  $faker->paragraph(),
                // 'rating' => $faker->numberBetween(1,5),
                // 'created_at' => $faker->dateTimeBetween('-20 days', now())
            ]);
        }

    }
}
