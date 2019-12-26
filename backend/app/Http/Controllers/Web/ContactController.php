<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $pathControllerView = 'web.pages.contact.';
    private $controllerName = 'contact';
    private $model;
    private $params = [];

    public function __construct(){
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request){

        return view($this->pathControllerView.'index',[
            'activeContact' => true,
            'params' => $this->params,
        ]);
    }

    public function feadback(Request $request){
        if($request->method() == 'POST'){
            $params = $request->all();
            // print_r($params);
            // die();
            Mail::send('mailfb', array('name'=>$params["fullname"],'email'=>$params["email"], 'subject' => $params['subject'], 'content'=>$params['content']), function($message){
                $message->to('thangnk.hust@gmail.com', $this->params['fullname'])->subject('Visitor Feedback!');
            });
            Session::flash('flash_message', 'Send message successfully!');
            return \redirect()->route($this->controllerName);
        }
    }

}
