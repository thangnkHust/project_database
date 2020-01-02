<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mail;
use Illuminate\Http\Request;

use \App\Mail\SendMailFeadback;

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
            // send mail thanks
            \Mail::to($params['email'])->send(new SendMailFeadback($params));
            
            // send mail storage
            $data = array(
                'fullname' => $params['fullname'],
                'email' => $params['email'],
                'content' => $params['content'],
            );
            Mail::send('mail.mail_storage', $data, function ($message) use($params){
                $message->from($params['email'], $params['fullname']);
                $message->to('elearning.website.project@gmail.com', 'E-Leanning Website');
                $message->subject($params['subject']);
            });
            return \redirect()->route($this->controllerName);
        }
    }

}
