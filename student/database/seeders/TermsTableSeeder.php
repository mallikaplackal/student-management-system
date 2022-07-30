<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('terms')->insert([
            'name' => 'One',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('terms')->insert([
            'name' => 'Two',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
