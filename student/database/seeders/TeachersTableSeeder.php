<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Katie',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('teachers')->insert([
            'name' => 'Max',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
