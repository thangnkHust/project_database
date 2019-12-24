<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\PostModel as PostModel;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $pathControllerView = 'web.pages.post.';
    private $controllerName = 'post';
    private $model;
    private $params = [];

    public function __construct(){
        // $this->params['pagination']['totalItemPerPage'] = 10;
        // $this->model = new MainModel;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        $params['subject_id'] = $request->subject_id;
        $postModel = new PostModel();
        $itemsPost = $postModel->listItems($params, ['task' => 'front-end-post-list-items']);

        return view($this->pathControllerView.'index',[
            'activePost' => true,
            'params' => $this->params,
            'items' => $itemsPost
        ]);
    }

    public function post(Request $request){
        $params['post_id'] = $request->post_id;
        $params['post_name'] = $request->post_name;
        $params['subject_id'] = $request->subject_id;
        $params['subject_name'] = $request->subject_name;
        // echo '<pre>';
        //     print_r($params);
        // echo '</pre>';
        // die();
        $postModel = new PostModel();
        $itemPost = $postModel->getItem($params, ['task' => 'front-end-post-detail']);

        return view($this->pathControllerView.'post',[
            'activePost' => true,
            'params' => $params,
            'item' => $itemPost
        ]);
    }

}
