<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ExamRequest extends FormRequest
{   
    private $table = 'exam';
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
        // echo $id;
        // die();
        // FIXME:fix unique name when form edit
        $condName = "bail|required|between:5,1000|unique:$this->table,name,subject_id";
        $condThumb = 'bail|required|image';
        if(!empty($id)){
            $condName = '';
            $condThumb = 'bail|image';
        }
        // FIXME: validate subject_id 
        return [
            'name' => $condName,
            'status' => 'bail|in:active,inactive',
            'subject_id' => 'required',
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
            'subject_id' => 'Field Subject: '
        ];
    }
}
