<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SubjectTableSeeder::class,
            PostTableSeeder::class,
            ExamTableSeeder::class,
            QuestionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class
            ]);
    }
}
