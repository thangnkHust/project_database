<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            ['name' => 'Toán học', 'status' => 'active'],
            ['name' => 'Vật Lý', 'status' => 'active'],
            ['name' => 'Hoá học', 'status' => 'active'],
            ['name' => 'Sinh học', 'status' => 'active'],
            ['name' => 'Tiếng Anh', 'status' => 'active'],
            ['name' => 'Công dân', 'status' => 'active'],
        ]);
    }
}
