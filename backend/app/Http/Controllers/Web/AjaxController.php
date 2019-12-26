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

        $select_answer = $request->checked;
        // for($i = 1; $i < $count; $i++){
        //     if(isset($_GET["ques$i"])){
        //         array_push($select_answer, $_GET["ques$i"]);
        //     }
        // }
        print_r($select_answer);
        // for($i = 0; $i < $cout; $i++){
        //     if($select_answer[$i] == $correct_answer[$i]){
        //         $mark += 0.2;
        //     }
        // }

        $xhtml = \sprintf(
            '<div style="border-radius: 10px; border: black 1px solid;border-color: black;" class="col-md-6 col-md-offset-2">
                <h3 style="text-align: center;">Kết Quả Bài Thi </h3>
                <p>User : Admin</p>
                <p>Tổng Điểm : %s</p>
                <p>Thời Gian : %s</p>
                <p>Dap an:</p>
            </div>', $count, $time
        );
        return $xhtml;
    }
}
