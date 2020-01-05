<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PostModel as PostModel;
use App\Models\ExamModel as ExamModel;
use App\Models\UserModel as UserModel;

class HomeController extends Controller
{
    private $pathControllerView = 'web.pages.home.';
    private $controllerName = 'home';
    private $model;
    private $params = [];

    public function __construct(){
        // $this->params['pagination']['totalItemPerPage'] = 10;
        // $this->model = new MainModel;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        $postModel = new PostModel();
        $examModel = new ExamModel();
        $userModel = new UserModel();
        $countPost = $postModel->countItems(null, ['task' => 'web-count-items'])[0]['count'];
        $countExam = $examModel->countItems(null, ['task' => 'web-count-items'])[0]['count'];
        $countUser = $userModel->countItems(null, ['task' => 'web-count-items'])[0]['count'];

        return view($this->pathControllerView.'index',[
            'activeHome' => true,
            'countItems' => $countExam + $countPost,
            'countUser' => $countUser
        ]);
    }

}
