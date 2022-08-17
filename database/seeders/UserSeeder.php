<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'slag' => 'SIRJAW',
            'email' => 'sirjaw4u@gmail.com',
            'first_name' => 'sir',
            'last_name' => 'jaw',
            'school_id' => 1,
            'tel' => '233240000000',
            'verification_code' => '123456',
            'password' => Hash::make('aaaaaaaa')
        ]);

    }
}
