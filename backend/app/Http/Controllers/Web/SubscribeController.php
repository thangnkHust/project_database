<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\SubscribeModel as SubscribeModel;
use Illuminate\Http\Request;

use \App\Mail\SendMail;

class SubscribeController extends Controller
{
    private $params = [];

    public function __construct(){
        // view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){
        if($request->method() == 'POST'){
            $params = $request->all();
            $subscribeModel = new SubscribeModel();
            $item = $subscribeModel->getItem($params, ['task' => 'get-email']);
            if(!$item){
                $subscribeModel->saveItem($params, ['task' => 'add-item']);
            }
            $data = array('email' => $params['email']);
            \Mail::to($params['email'])->send(new SendMail($data));
            return \redirect()->route('home');
        }
    }

}
