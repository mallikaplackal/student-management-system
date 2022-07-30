<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Maths',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Science',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'History',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
