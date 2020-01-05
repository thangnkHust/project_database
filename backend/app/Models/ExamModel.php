<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Models\SubjectModel as SubjectModel;

class ExamModel extends Model
{
    protected $table = 'exam';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id', 'name', 'subject_id'
    ];
    protected $crudNotAccepted = [
        '_token', 'thumb_current'
    ];

    public function subject(){
        return $this->belongsTo('App\Models\SubjectModel', 'subject_id');
    }

    // public function question(){
    //     return $this->hasMany('App\Models\QuestionModel', 'id');
    // }

    public function listItems($params, $option){
        $subjectModel = new SubjectModel();
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this->select('id', 'name', 'thumb', 'subject_id', 'status', 'created_at', 'updated_at');
            
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }

            if($params['search']['value'] != ''){   
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params, $subjectModel){
                        foreach($this->fieldSearchAccepted as $column){
                            if($column == 'subject_id'){
                                // Xu ly truong hop search by subject
                                $subject_id = $subjectModel->getItem($params, ['task' => 'get-subject_id-by-name']);
                                $query->orWhere($column, $subject_id['id']);
                            }else{
                                // field search con lai
                                $query->orWhere($column, 'like', "%{$params['search']['value']}%");
                            }
                        } 
                    });
                }elseif($params['search']['field'] == 'subject_id'){
                    $subject_id = $subjectModel->getItem($params, ['task' => 'get-subject_id-by-name']);
                    $query->where($params['search']['field'], $subject_id['id']);
                }else{
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemPerPage']);
        }

        if($option['task'] == 'front-end-exam-list-items'){
            $result = $this->select('id', 'name', 'viewed', 'subject_id', 'thumb')
                            ->where('subject_id',$params['subject_id'])
                            ->where('status','active')->get();
        }

        if($option['task'] == 'front-end-news-list-items'){
            $result = $this->select('id', 'name', 'thumb', 'subject_id', 'updated_at')
                            ->where('status', 'active')
                            ->orderBy('id', 'desc')
                            ->take(3)
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
            $thumb = $params['thumb'];
            $params['thumb'] = Str::random(10) . '.' . $thumb->clientExtension();
            $thumb->storeAs('exam', $params['thumb'], 'images_public');
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::insert($params);
        }
        // Chuc nang edit
        if($option['task'] == 'edit-item'){
            // Upload new image
            if(!empty($params['thumb'])){
                Storage::disk('images_public')->delete('exam/' . $params['thumb_current']);
                $thumb = $params['thumb'];
                $params['thumb'] = Str::random(10) . '.' . $thumb->clientExtension();
                $thumb->storeAs('exam', $params['thumb'], 'images_public');
            }
            // Don't upload new image
            $params = array_diff_key($params, array_flip($this->crudNotAccepted));
            self::where('id', $params['id'])->update($params);
        }
    }

    public function deleteItem($params = null, $option = null){
        if($option['task'] = 'delete-item'){
            $item = self::getItem($params, ['task' => 'get-thumb']);
            Storage::disk('images_public')->delete('exam/' . $item['thumb']);
            self::where('id', $params['id'])
                ->delete();
        }
    }

    public function getItem($params = null, $option = null){
        $result = null;
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'name', 'thumb', 'subject_id', 'status')->where('id', $params['id'])->first();
        }
        if($option['task'] == 'get-thumb'){
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-exam_id-by-name'){
            $result = self::select('id')->where('name', 'LIKE', "%{$params['search']['value']}%")->first();
        }

        if($option['task'] == 'front-end-exam-detail'){
            $result = self::select('id', 'name', 'thumb', 'subject_id')->where('id', $params['exam_id'])->first();
        }
        return $result;
    }

    // FIXME: Count items when search by all and search by subject
    public function countItems($params, $option){
        $result = null;
        if($option['task'] == 'admin-count-items-group-by-status'){
            $query = self::select(DB::raw('count(id) as count, status'))
                                    // ->where('id', '>', 3)
                                    ->groupBy('status');

            if($params['search']['value'] != ''){
                if($params['search']['field'] == 'all'){
                    $query->where(function($query) use($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'like', "%{$params['search']['value']}%");
                        } 
                    });
                }else{
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->get()
                            ->toArray();   
        }

        if($option['task'] == 'web-count-items'){
            $result = self::select(DB::raw('count(id) as count'))->where('status', 'active')->get()->toArray();
        }
        return $result;
    }
    
}
