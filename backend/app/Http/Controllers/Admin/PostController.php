<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\PostModel as MainModel;
use App\Models\SubjectModel as SubjectModel;
use App\Models\SubscribeModel as SubscribeModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest as MainRequest;

use \App\Mail\SendMailNew;

class PostController extends Controller
{
    private $pathControllerView = 'admin.pages.post.';
    private $controllerName = 'post';
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
        }
        $subjectModel = new SubjectModel();
        $itemsSubject = $subjectModel->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
        // echo '<pre>';
        // print_r($itemsSubject);
        // echo '</pre>';
        // die();
        return view($this->pathControllerView.'form', [
            'item' => $items,
            'itemsSubject' => $itemsSubject
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
            $subjectModel = new SubjectModel();
            $params['subject'] = $subjectModel::select('name')->where('id', $params['subject_id'])->first()['name'];
            $subscribeModel = new SubscribeModel();
            // send list mail subscribe
            if($params['id'] == null){
                $subscribeItems = $subscribeModel::select('email')->get();
                foreach($subscribeItems as $item){
                    \Mail::to($item['email'])->send(new SendMailNew($params));
                }
            }
            
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
