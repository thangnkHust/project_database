<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['type' => 1, 'name' => 'admin'],
            ['type' => 2, 'name' => 'client'],
        ]);
    }
}
