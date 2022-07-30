<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'John Doe',
            'age' => 10,
            'email' => 'john@gmail.com',
            'gender' => 'M',
            'teacher_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('students')->insert([
            'name' => 'Mary',
            'age' => 10,
            'email' => 'mary@gmail.com',
            'gender' => 'F',
            'teacher_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
