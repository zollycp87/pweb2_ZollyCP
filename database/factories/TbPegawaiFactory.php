<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TbPegawai>
 */
class TbPegawaiFactory extends Factory
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
                'nama_pegawai' => $faker->name,
                'divisi' => $faker->randomElement(['Cleaning Service','Security'])
        ];
    }
}
