<?php

namespace App\Http\Controllers\Web;
use App\Models\QuestionModel as QuestionModel;
use App\Models\SampleExamModel as SampleExamModel;
use App\Http\Controllers\Controller;
use App\Helpers\hightlight as hightlight;

use Illuminate\Http\Request;
use Validator;

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
        $temp = 10/$count;

        $correct_answer = [];
        foreach($questions as $q){
            array_push($correct_answer, $q['correct_answer']);
        }

        $select_answer = $request->all();
        
        $new_arr = [];

        if(isset($select_answer['arr'])){
            foreach($select_answer['arr'] as $item){
                $new_arr[$item['name']] = (int)$item['value'];
            }
        }

        if($count != \count($new_arr)){
            return response()->json(['error'=> 'Hãy điền hết các đáp án!']);
        }else{
            for($i = 1; $i <= $count; $i++){
                if(isset($new_arr[$i])){
                    if($new_arr[$i] == $correct_answer[$i-1]){
                        $mark += $temp;
                    }
                }
            }

            $mark = round($mark, 2);

            if($count <= 25){
                $table = '<tr style="background-color: rgb(13, 69, 86); color: white">';
                for($i = 1; $i <= $count; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', $i
                    );
                }
                $table .= '</tr><tr>';
                for($i = 1; $i <= $count; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', hightlight::showAnswer($select[$new_arr[$i]], $select[$correct_answer[$i-1]])
                    );
                }
                $table .= '</tr>';
            }else{
                $table = '<tr style="background-color: rgb(13, 69, 86); color: white">';
                for($i = 1; $i <= 25; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', $i
                    );
                }
                $table .= '</tr><tr>';
                for($i = 1; $i <= 25; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', $select[$correct_answer[$i-1]]
                    );
                }
                $table .= '</tr>';

                $table .= '<tr style="background-color: rgb(13, 69, 86); color: white">';
                for($i = 26; $i <= $count; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', $i
                    );
                }
                $table .= '</tr><tr>';
                for($i = 25; $i < $count; $i++){
                    $table .= \sprintf(
                        '<td style="padding: 4px; width: 30px">%s</td>', $select[$correct_answer[$i-1]]
                    );
                }
                $table .= '</tr>';
            }
            
            // Get session user after login
            $userInfo = $request->session()->get('userInfo');

            $xhtml = \sprintf(
                '<div style="border-radius: 10px; border: black 1px solid;border-color: black;" class="col-md-8 col-md-offset-1">
                    <h3 style="text-align: center;">Kết Quả Bài Thi </h3>
                    <p>User : %s</p>
                    <p>Tổng Điểm : %s / 10</p>
                    <p>Thời Gian : %s</p>
                    <div>
                        <p>Đáp án đúng : </p>
                        <table class="tableStyle" border="1">
                            <tbody>
                                %s
                            </tbody>
                        </table>
                    </div>
                    <p style="color: red;">*Đáp án sai được tô đỏ</p>
                </div>', $userInfo['name'], $mark, $time, $table
            );
            $userInfo['exam_id'] = $idExam;
            $userInfo['mark'] = $mark;
            $userInfo['time'] = $time;
            $sampleExamModel = new SampleExamModel();
            $sampleExamModel->saveItem($userInfo, ['task' => 'add-result']);

            return response()->json(['success'=>"Nộp bài thành công!", 'result' => $xhtml]);
        }

        
        // return $xhtml;
    }
}
