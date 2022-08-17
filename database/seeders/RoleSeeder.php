<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'system admin',
            'created_by' => 1
        ],
        [
            'name' => 'school admin',
            'created_by' => 1
        ],[
            'name' => 'school rep',
            'created_by' => 1
        ],[
            'name' => 'hostel rep',
            'created_by' => 1
        ]);
    }
}
