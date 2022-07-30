<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
            'term_id' => 1,
            'subject_id' => 1,
            'student_id' => 1,
            'mark' => 40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 1,
            'subject_id' => 2,
            'student_id' => 1,
            'mark' => 40,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 1,
            'subject_id' => 3,
            'student_id' => 1,
            'mark' => 40,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 1,
            'student_id' => 1,
            'mark' => 30,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 2,
            'student_id' => 1,
            'mark' => 45,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 3,
            'student_id' => 1,
            'mark' => 49,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 1,
            'student_id' => 2,
            'mark' => 50,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 2,
            'student_id' => 2,
            'mark' => 50,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('exams')->insert([
            'term_id' => 2,
            'subject_id' => 3,
            'student_id' => 2,
            'mark' => 50,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
