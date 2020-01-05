<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Http\Requests\AuthLoginRequest as AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest as AuthRegisterRequest;
use App\Models\UserModel as UserModel;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\View;
use DB;

class AuthController extends Controller
{
    private $pathControllerView = 'web.pages.auth.';
    private $controllerName = 'auth';
    private $model;
    private $params = [];

    public function __construct(){
        view()->share('controllerName', $this->controllerName);
    }

    public function login(Request $request){
        return view($this->pathControllerView.'login');
    }

    public function postlogin(AuthLoginRequest $request){
        if($request->method() === 'POST'){
            $params = $request->all();
            $userModel = new UserModel();
            $userInfo = $userModel->getItem($params, ['task' => 'auth-login']);
            if(!$userInfo){
                return \redirect()->route($this->controllerName . '/login')->with('notify', 'Tài khoản hoặc mật khẩu không chính xác');
            }
            if($userInfo['status'] == 'inactive'){
                return \redirect()->route($this->controllerName . '/login')->with('notify', 'Tài khoản của bạn đã bị khoá');
            }
            $request->session()->put('userInfo', $userInfo);
            return \redirect()->route('home');
        }
        // return view($this->pathControllerView.'postlogin');
    }
    
    public function logout(Request $request){
        if($request->session()->has('userInfo')){
            $request->session()->pull('userInfo');
        }
        return \redirect()->route('home');
    }

    public function register(Request $request){
        return view($this->pathControllerView.'register');
    }

    public function postRegister(AuthRegisterRequest $request){
        if($request->method() === 'POST'){
            $params = $request->all();
            $userModel = new UserModel();
            $userModel->saveItem($params, ['task' => 'register-user']);
            return \redirect()->route('auth/login')->with('success', 'Đăng ký tài khoản thành công!');
        }
        // return view($this->pathControllerView.'postlogin');
    }

    public function profile(Request $request){
        $id = $request->id;
        $userModel = new UserModel();
        $items = $userModel::select('name', 'email', 'avatar')->where('id', $id)->get()[0];
        return view($this->pathControllerView.'profile',[
            'items' => $items,
        ]);
    }

    public function postProfile(Request $request){
        if($request->email != session('userInfo')->email){
            return \redirect()->route('auth/profile', ['id' => session('userInfo')->id])->with('notify', 'Bạn đã nhập sai Email!');
        }
        $userModel = new UserModel();
        $params = $request->all();
        $userModel->saveItem($params, ['task' => 'edit-profile']);
        return \redirect()->route('auth/profile', ['id' => session('userInfo')->id])->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function pass(Request $request){
        return view($this->pathControllerView.'pass');
    }

    public function postPass(Request $request){
        $params = $request->all();
        // \dd($params);
        if(md5($params['password_current']) != session('userInfo')->password){
            return \redirect()->route('auth/pass')->with('notify', 'Bạn đã nhập sai mật khẩu hiện tại!');
        }
        if($params['password_new'] != $params['password_new_confirm']){
            return \redirect()->route('auth/pass')->with('notify', 'Nhập lại mật khẩu sai!');
        }
        if(md5($params['password_new']) == session('userInfo')->password){
            return \redirect()->route('auth/pass')->with('notify', 'Mật khẩu mới phải khác mật khẩu hiện tại!');
        }
        $userModel = new UserModel();
        $userModel->saveItem($params, ['task' => 'edit-password']);
        return \redirect()->route('auth/pass')->with('success', 'Cập nhật mật khẩu thành công!');
    }
}

