<?php

namespace App\Http\Controllers\Admin;
use App\Models\ExamModel as ExamModel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getExam(Request $request){
        $idSubject = $request->idSubject;
        $examItems = ExamModel::select('id', 'name')->where('subject_id', $idSubject)->get()->toArray();
        $xhtml = '';
        foreach($examItems as $item){
            $xhtml .=  "<option value='" . $item['id'] ."'>" . $item['name'] . "</option>";
        }
        return $xhtml;
    }
}
