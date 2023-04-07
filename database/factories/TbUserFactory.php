<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TbUserModel>
 */
class TbUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create(); 
        return[
                'nip' => $faker->unique()->numberBetween(100000, 999999),
                'username' => $faker->name,
                'password' => bcrypt('password'),
                'email' => $faker->unique()->safeEmail,
                'jabatan_user' => $faker->randomElement(['Leader OB','Komandan Regu','Admin','Manager'])
        ];
    }
}
