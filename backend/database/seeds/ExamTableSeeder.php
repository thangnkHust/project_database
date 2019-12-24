<?php

use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam')->insert([
            ['name' => 'Thi thử 1', 'subject_id' => '1', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '1', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 1', 'subject_id' => '2', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '2', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 1', 'subject_id' => '3', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '3', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 1', 'subject_id' => '4', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '4', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 1', 'subject_id' => '5', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '5', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 1', 'subject_id' => '6', 'status' => 'active', 'thumb' => '私.jpg'],
            ['name' => 'Thi thử 2', 'subject_id' => '6', 'status' => 'active', 'thumb' => '私.jpg'],
        ]);
    }
}
