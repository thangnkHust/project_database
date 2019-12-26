<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Models\SubjectModel as SubjectModel;

class QuestionModel extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id', 'name'
    ];
    protected $crudNotAccepted = [
        '_token', 'subject'
    ];

    public function exam(){
        return $this->belongsTo('App\Models\ExamModel', 'exam_id');
    }

    // FIXME:function search
    public function listItems($params, $option){
        $examModel = new ExamModel();
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this->select('id', 'exam_id', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'correct_answer', 'created_at', 'updated_at');
            
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }

            if($params['search']['value'] != ''){   
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params, $examModel){
                        foreach($this->fieldSearchAccepted as $column){
                            if($column == 'exam_id'){
                                // Xu ly truong hop search by subject
                                $exam_id = $examModel->getItem($params, ['task' => 'get-exam_id-by-name']);
                                $query->orWhere($column, $exam_id['id']);
                            }else{
                                // field search con lai
                                $query->orWhere($column, 'like', "%{$params['search']['value']}%");
                            }
                        } 
                    });
                }elseif($params['search']['field'] == 'subject_id'){
                    $exam_id = $examModel->getItem($params, ['task' => 'get-exam_id-by-name']);
                    $query->where($params['search']['field'], $exam_id['id']);
                }else{
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemPerPage']);
            
        }

        if($option['task'] == 'front-end-exam-list-items'){
            $result = $this->select('id', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'correct_answer')
                            ->where('exam_id', $params['exam_id'])
                            ->get();
        }

        return $result;

    }

    public function saveItem($params = null, $option = null){
        // Chuc nang thay doi status
        if($option['task'] == 'change-status'){
            $status = ($params['currentStatus'] == 'active') ? 'inactive' : 'active';
            self::where('id', $params['id'])
                ->update(['status' => $status]);
        }
        // Chuc nang add
        if($option['task'] == 'add-item'){
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::insert($params);
        }
        // Chuc nang edit
        if($option['task'] == 'edit-item'){
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::where('id', $params['id'])->update($params);
        }
    }

    public function deleteItem($params = null, $option = null){
        if($option['task'] = 'delete-item'){
            self::where('id', $params['id'])
                ->delete();
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'exam_id', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'correct_answer')->where('id', $params['id'])->first();
        }
        return $result;
    }
    
}
