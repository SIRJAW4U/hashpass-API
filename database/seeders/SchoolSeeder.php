<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'name' => 'university of cape coast',
            'slag' => 'UCC',
            'created_by' => 1
        ],
        [
            'name' => 'kwame nkrumah university of science and technology',
            'slag' => 'KNUST',
            'created_by' => 1
        ]);
    }
}
