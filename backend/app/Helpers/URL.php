<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class URL{
    public static function linkPost($id, $name){
        return route('post/subject', [
            'subject_id' => $id,
            'subject_name' => Str::slug($name, '_')
        ]);
    }

    public static function linkPostDetail($subject_id, $subject_name, $post_id, $post_name){
        return route('post/post', [
            'subject_id' => $subject_id,
            'subject_name' => Str::slug($subject_name, '_'),
            'post_id' => $post_id,
            'post_name' => Str::slug($post_name, '_')
        ]);
    }

    public static function linkExam($id, $name){
        return route('exam/subject', [
            'subject_id' => $id,
            'subject_name' => Str::slug($name, '_')
        ]);
    }

    public static function linkExamDetail($subject_id, $subject_name, $exam_id, $exam_name){
        return route('exam/exam', [
            'subject_id' => $subject_id,
            'subject_name' => Str::slug($subject_name, '_'),
            'exam_id' => $exam_id,
            'exam_name' => Str::slug($exam_name, '_')
        ]);
    }
    
}