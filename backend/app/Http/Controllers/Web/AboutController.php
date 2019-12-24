<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
// use App\Models\PostModel as PostModel;
// use App\Models\ExamModel as ExamModel;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $pathControllerView = 'web.pages.about.';
    private $controllerName = 'about';
    private $model;
    private $params = [];

    public function __construct(){
        // $this->params['pagination']['totalItemPerPage'] = 10;
        // $this->model = new MainModel;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        // $postModel = new PostModel();
        // $itemsPost = $postModel->listItems(null, ['task' => 'front-end-news-list-items']);

        // $examModel = new ExamModel();
        // $itemsExam = $examModel->listItems(null, ['task' => 'front-end-news-list-items']);

        return view($this->pathControllerView.'index',[
            'activeAbout' => true,
            'params' => $this->params,
            // 'itemsPost' => $itemsPost,
            // 'itemsExam' => $itemsExam,
        ]);
    }

}
