<?php

namespace App\Http\Controllers\Admin;
use App\Models\QuestionModel as MainModel;
use App\Models\SubjectModel as SubjectModel;
use App\Models\ExamModel as ExamModel;
use App\Http\Requests\QuestionRequest as MainRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $pathControllerView = 'admin.pages.question.';
    private $controllerName = 'question';
    private $model;
    private $params = [];

    public function __construct(){
        $this->params['pagination']['totalItemPerPage'] = 12;
        $this->model = new MainModel;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        
        // Bat su kien status
        $this->params['filter']['status'] =  $request->input('filter_status', 'all');
        $this->params['search']['field'] =  $request->input('search_field', '');
        $this->params['search']['value'] =  $request->input('search_value', '');

        // Lay danh sach hien thi list slider
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);

        // Nhom status
        // $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        // [
        //     ['status' => '...',
        //     'count' => ...
        //     ]
        // ]

        return view($this->pathControllerView.'index', [
            'items' => $items,
            // 'itemsStatusCount' => $itemsStatusCount,
            'params' => $this->params
        ]);
    }

    public function form(Request $request){
        $items = null;
        $subjectItems = SubjectModel::select('id', 'name')->get()->toArray();
        $examItems = ExamModel::select('id', 'name')->get()->toArray();

        // echo '<pre>';
        // print_r(array_column($examItems,'name', 'id'));
        // echo '</pre>';
        // die();
        if($request->id != null){
            $params['id'] = $request->id;
            $items = $this->model->getItem($params, ['task' => 'get-item']);
            // echo '<pre>';
            // print_r($items);
            // echo '</pre>';
            // die();
        }
        return view($this->pathControllerView.'form', [
            'item' => $items,
            'subjectItems' => array_column($subjectItems,'name', 'id'),
            'examItems' => array_column($examItems,'name', 'id')
        ]);
    }

    public function save(MainRequest $request){
        if($request->method() == 'POST'){
            $params = $request->all();
            $task = 'add-item';
            $notify = 'Add item successfully';

            if($params['id'] != null){
                $task = 'edit-item';
                $notify = 'Update item successfully';
            }
            $this->model->saveItem($params, ['task' => $task]);
            return \redirect()->route($this->controllerName)->with('notify', $notify);
        }
    }

    // public function status(Request $request){
    //     $params['currentStatus'] = $request->status;
    //     $params['id'] = $request->id;
    //     $this->model->saveItem($params, ['task' => 'change-status']);
    //     $status = ($params['currentStatus'] == 'active') ? 'inactive' : 'active';
    //     return \redirect()->route($this->controllerName)->with('notify', \sprintf('Update element id = %s status from %s to %s', $params['id'], $params['currentStatus'], $status));
    // }

    public function delete(Request $request){
        $params['id'] = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);
        return \redirect()->route($this->controllerName)->with('notify', \sprintf('Delete element sucessfully'));
    }

}
