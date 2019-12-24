<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\ExamModel as ExamModel;
use App\Models\QuestionModel as QuestionModel;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $pathControllerView = 'web.pages.exam.';
    private $controllerName = 'exam';
    private $model;
    private $params = [];

    public function __construct(){
        // $this->params['pagination']['totalItemPerPage'] = 10;
        // $this->model = new MainModel;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        $params['subject_id'] = $request->subject_id;
        $examModel = new ExamModel();
        $itemsExam = $examModel->listItems($params, ['task' => 'front-end-exam-list-items']);

        return view($this->pathControllerView.'index',[
            'activeExam' => true,
            'params' => $this->params,
            'items' => $itemsExam
        ]);
    }

    public function exam(Request $request){
        $params['exam_id'] = $request->exam_id;
        $params['exam_name'] = $request->exam_name;
        $params['subject_id'] = $request->subject_id;
        $params['subject_name'] = $request->subject_name;
        
        $examModel = new examModel();
        $itemExam = $examModel->getItem($params, ['task' => 'front-end-exam-detail']);
        $questionModel = new QuestionModel();
        $itemsQuestion = $questionModel->listItems($params, ['task' => 'front-end-post-list-items']);

        // echo '<pre>';
        // print_r($itemsQuestion->toArray());
        // echo '</pre>';
        // die();

        return view($this->pathControllerView.'exam',[
            'activeExam' => true,
            'params' => $params,
            'item' => $itemExam,
            'items' => $itemsQuestion
        ]);
    }

}
