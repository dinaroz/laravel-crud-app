<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

        foreach (range(1,10) as $index) {
            DB::table('tasks')->insert([
                'name' => $faker->randomLetter,
                'status' => "new"
            ]);
        }
    }
}
