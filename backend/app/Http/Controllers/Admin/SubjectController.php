<?php

namespace App\Http\Controllers\Admin;
use App\Models\SubjectModel as MainModel;
use App\Http\Requests\SubjectRequest as MainRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $pathControllerView = 'admin.pages.subject.';
    private $controllerName = 'subject';
    private $model;
    private $params = [];

    public function __construct(){
        $this->params['pagination']['totalItemPerPage'] = 10;
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
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        // [
        //     ['status' => '...',
        //     'count' => ...
        //     ]
        // ]

        return view($this->pathControllerView.'index', [
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount,
            'params' => $this->params
        ]);
    }

    public function form(Request $request){
        $items = null;
        if($request->id != null){
            $params['id'] = $request->id;
            $items = $this->model->getItem($params, ['task' => 'get-item']);
            // echo '<pre>';
            // print_r($items);
            // echo '</pre>';
            // die();
        }
        return view($this->pathControllerView.'form', [
            'item' => $items
        ]);
    }

    public function save(MainRequest $request){
        if($request->method() == 'POST'){
            $validated = $request->validated();
            $params = $request->all();
            \dd($validated);
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

    public function status(Request $request){
        $params['currentStatus'] = $request->status;
        $params['id'] = $request->id;
        $this->model->saveItem($params, ['task' => 'change-status']);
        $status = ($params['currentStatus'] == 'active') ? 'inactive' : 'active';
        return \redirect()->route($this->controllerName)->with('notify', \sprintf('Update element id = %s status from %s to %s', $params['id'], $params['currentStatus'], $status));
    }

    public function delete(Request $request){
        $params['id'] = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);
        return \redirect()->route($this->controllerName)->with('notify', \sprintf('Delete element sucessfully', $params['id']));
    }

}
