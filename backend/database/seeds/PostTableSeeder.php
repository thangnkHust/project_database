<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            ['subject_id' => 1, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 1, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 2, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 2, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 3, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 3, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 4, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 4, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 5, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 5, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 6, 'name' => 'Chủ đề 1', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
            ['subject_id' => 6, 'name' => 'Chủ đề 2', 'content' => 'Chia sẻ về số phức, cách tính toán số phức', 'status' => 'active', 'thumb' => '私.jpg'],
        ]);
    }
}
