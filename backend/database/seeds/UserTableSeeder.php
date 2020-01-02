<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            ['role_id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '123456', 'avatar' => '私.jpg', 'status' => 'active'],
            ['role_id' => 2, 'name' => 'Thang', 'email' => 'thang@gmail.com', 'password' => '123456', 'avatar' => '私.jpg', 'status' => 'active'],
            ['role_id' => 2, 'name' => 'Thuc', 'email' => 'thuc@gmail.com', 'password' => '123456', 'avatar' => '人を信じる.jpg', 'status' => 'active'],
        ]);
    }
}
