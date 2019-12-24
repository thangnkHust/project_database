<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert([
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 1, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 2, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],

            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 3, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],

            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 4, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],

            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 5, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],

            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 4],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 3],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 2],
            ['exam_id' => 6, 'question' => 'Question content', 'answer_a' => 'test', 'answer_b' => 'test', 'answer_c' => 'test', 'answer_d' => 'test', 'correct_answer' => 1],
        ]);
    }
}
