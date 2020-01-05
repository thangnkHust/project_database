<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SubjectRequest extends FormRequest
{   
    private $table = 'subject';
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
        $id = $this->id;
        $condName = "bail|required|between:5,1000|unique:$this->table,name";
        if(!empty($id)){
            $condName .= ",$id";
        }
        return [
            'name' => $condName,
            'status' => 'bail|in:active,inactive',
        ];
    }

    public function messages(){
        return [

        ];
    }

    public function attributes()
    {
        return [
            // 'description' => 'Feild Description: ',
            'status' => 'Feild Status: ',
            'name' => 'Feild Name: ',
            // 'link' => 'Feild Link: ',
        ];
    }
}
