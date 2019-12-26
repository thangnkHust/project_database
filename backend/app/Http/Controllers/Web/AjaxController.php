<?php

namespace App\Http\Controllers\Web;
use App\Models\QuestionModel as QuestionModel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getExam(Request $request){
        // param gui tu ajax
        $idExam = $request->idExam;
        $time = $request->time;
        // Get data from model
        $questionModel = new QuestionModel();
        $questions = $questionModel->listItems(['exam_id' => $idExam], ['task' => 'front-end-exam-list-items']);
        // define variable
        $select = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D'];
        $mark = 0;
        $count = count($questions->toArray());

        $correct_answer = [];
        foreach($questions as $q){
            array_push($correct_answer, $q['correct_answer']);
        }

        $select_answer = $request->arr;

        for($i = 0; $i < $count; $i++){
            if(isset($select_answer[$i])){
                if($select_answer[$i] == $correct_answer[$i]){
                    $mark += 0.2;
                }
            }
        }

        if($count <= 25){
            $table = '<tr style="background-color: rgb(13, 69, 86); color: white">';
            for($i = 0; $i < $count; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $i+1
                );
            }
            $table .= '</tr><tr>';
            for($i = 0; $i < $count; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $select[$correct_answer[$i]]
                );
            }
            $table .= '</tr>';
        }else{
            $table = '<tr style="background-color: rgb(13, 69, 86); color: white">';
            for($i = 0; $i < 25; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $i+1
                );
            }
            $table .= '</tr><tr>';
            for($i = 0; $i < 25; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $select[$correct_answer[$i]]
                );
            }
            $table .= '</tr>';

            $table .= '<tr style="background-color: rgb(13, 69, 86); color: white">';
            for($i = 25; $i < $count; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $i+1
                );
            }
            $table .= '</tr><tr>';
            for($i = 25; $i < $count; $i++){
                $table .= \sprintf(
                    '<td style="padding: 4px; width: 30px">%s</td>', $select[$correct_answer[$i]]
                );
            }
            $table .= '</tr>';
        }
        

        $xhtml = \sprintf(
            '<div style="border-radius: 10px; border: black 1px solid;border-color: black;" class="col-md-8 col-md-offset-1">
                <h3 style="text-align: center;">Kết Quả Bài Thi </h3>
                <p>User : Admin</p>
                <p>Tổng Điểm : %s</p>
                <p>Thời Gian : %s</p>
                <div>
                    <table class="tableStyle" border="1">
                        <tbody>
                            %s
                        </tbody>
                    </table>
                </div>
            </div>', $mark, $time, $table
        );
        return $xhtml;
    }
}
