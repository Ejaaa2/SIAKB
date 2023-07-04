<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            ['name' => 'manda',
             'email' => 'mandamandi@gmail.com',
             'password' => bcrypt('manda123'),
             'alamat'=>'jl Rungkut',
             'jabatan'=>'admin',
             'nohp' => '085730205815',
             'foto'=>'photo3.png']
            ));
    }
}
