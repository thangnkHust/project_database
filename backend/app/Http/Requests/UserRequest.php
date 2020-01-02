<?php

namespace App\Http\Requests;
use App\Models\UserModel as UserModel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;


class UserRequest extends FormRequest
{   
    private $table = 'user';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $task = $this->task;
        $id = $this->id;
        $condAvatar = '';
        $condName = '';
        $condEmail = '';
        $condPassword = '';
        $condOldPassword = '';
        $condLevel = '';
        $condStatus = '';

        switch($task){
            case 'add':
                $condName = "bail|required|between:5,1000";
                $condEmail = "bail|required|unique:$this->table,email";
                $condPassword = 'bail|required|between:5,100|confirmed';
                $condStatus = 'bail|in:active,inactive';
                $condLevel = 'bail|in:admin,client';
                $condAvatar = 'bail|required|image|max:2000';
                break;
            case 'edit-info':
                $condName = "bail|required|between:5,1000";
                $condEmail = "bail|required|unique:$this->table,email,$id";
                $condStatus = 'bail|in:active,inactive';
                $condAvatar = 'bail|image|max:2000';
                break;
            case 'change_password':
                $condOldPassword = "required";
                $condPassword = 'bail|required|between:5,100|confirmed';
                break;
            case 'change_level':
                $condLevel = 'bail|in:1,2';
                break;
        }

        return [
            'name' => $condName,
            'email' => $condEmail,
            // 'old_password' => $condOldPassword,
            'password' => $condPassword,
            'role_id' => $condLevel,
            'status' => $condStatus,
            'avatar' => $condAvatar
        ];
    }

    // public function withValidator($validator)
    // {   
    //     $userModel = new UserModel();
    //     $id = $this->id;
    //     $pass = $userModel::select('password')->where('id', $id)->first();
    //     $pass['password'] = md5($pass['password']);
    //     // checks user current password
    //     // before making changes
    //     $validator->after(function ($validator) {
    //         if ( !Hash::check($this->old_password, $this->pass['password']) ) {
    //             $validator->errors()->add('old_password', 'Your current password is incorrect.');
    //         }
    //     });
    //     return;
    // }

    public function messages(){
        return [

        ];
    }

    public function attributes()
    {
        return [
            
        ];
    }
}
