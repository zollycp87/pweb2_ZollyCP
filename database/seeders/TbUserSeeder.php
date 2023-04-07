<?php

namespace Database\Seeders;

use App\Models\TbUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TbUser::factory(10)->create();

        // $data = TbUser::create(); 
        // return[
        //         'nip' => '121212',
        //         'username' => 'Zolly',
        //         'password' => bcrypt('123456'),
        //         'email' => 'zolly@gmail.com',
        //         'jabatan_user' => 'Admin'
        // ];

        DB::table('tb_user')->insert([
            'nip' => '010101',
            'username' => 'Manager1',
            'password' => bcrypt('password'),
            'email' => 'manager1@gmail.com',
            'jabatan_user' => 'Manager'
        ]);
    }
}
