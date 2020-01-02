<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel as UserModel;

class SampleExamModel extends Model
{
    protected $table = 'sample_exam';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function saveItem($params = null, $option = null){
        
        // Chuc nang add
        if($option['task'] == 'add-result'){
            $userModel = new UserModel();
            $id = $userModel::select('id')->where('email', $params['email'])->first();
            $this->exam_id = $params['exam_id'];
            $this->user_id = $id['id'];
            $this->mark = $params['mark'];
            $this->time = $params['time'];
            $this->save();

        }
    }
}
