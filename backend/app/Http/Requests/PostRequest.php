<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostRequest extends FormRequest
{   
    private $table = 'post';
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
        $condThumb = 'bail|required|image';
        if(!empty($id)){
            $condName .= ",$id";
            $condThumb = 'bail|image';
        }
        return [
            'name' => $condName,
            'content' => 'bail|required|min:5',
            'status' => 'bail|in:active,inactive',
            // 'category' => 'bail|in:',
            'thumb' => $condThumb
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
            // 'status' => 'Feild Status: ',
            // 'name' => 'Feild Name: ',
            // 'link' => 'Feild Link: ',
        ];
    }
}
