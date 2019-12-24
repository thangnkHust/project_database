<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuestionRequest extends FormRequest
{   
    private $table = 'question';
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
    // FIXME: unique name, selection
    public function rules()
    {   
        $id = $this->id;
        return [
            'subject' => 'required',
            'exam_id' => 'required',
            'question' => 'bail|required|min:5',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'correct_answer' => 'required',
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
