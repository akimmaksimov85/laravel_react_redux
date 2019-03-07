<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            \App\Player::create([
                'name' => $faker->name,
                'answers' => $faker->randomDigitNotNull,
                'points' => $faker->randomDigitNotNull,
            ]);
        }
    }
}
