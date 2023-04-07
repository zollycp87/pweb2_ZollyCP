<?php

namespace Database\Seeders;

use App\Models\TbPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TbPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TbPegawai::factory(20)->create();
    }
}
