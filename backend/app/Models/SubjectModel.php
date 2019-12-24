<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fieldSearchAccepted = [
        'id', 'name', 'description'
    ];
    protected $crudNotAccepted = [
        '_token'
    ];

    public function listItems($params, $option){
        $result = null;
        if($option['task'] == 'admin-list-items'){
            $query = $this->select('id', 'name', 'description', 'status', 'created_at', 'updated_at');
            
            if($params['filter']['status'] != 'all'){
                $query->where('status', '=', $params['filter']['status']);
            }

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
            $result = $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemPerPage']);
        }

        if($option['task'] == 'admin-list-items-in-selectbox'){
            $query = $this->select('id', 'name')
                        // ->orderBy('name', 'asc')
                        ->where('status', '=', 'active');
            $result = $query->pluck('name', 'id')->toArray();
        }

        if($option['task'] == 'front-end-list-items'){
            $result = $this->select('id', 'name')
                        ->where('status', 'active')
                        ->get()
                        ->toArray();
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
        // echo $option['task'];
        // die();
        if($option['task'] == 'get-item'){
            $result = self::select('id', 'name', 'description', 'status')->where('id', $params['id'])->first();
        }

        if($option['task'] == 'get-subject_id-by-name'){
            $result = self::select('id')->where('name', 'LIKE', "%{$params['search']['value']}%")->first();
        }
        return $result;
    }

    public function countItems($params, $option){
        $result = null;
        if($option['task'] == 'admin-count-items-group-by-status'){
            $query = self::select(DB::raw('count(id) as count, status'))
                                    // ->where('id', '>', 3)
                                    ->groupBy('status');

            // if($params['search']['value'] != ''){
            //     if($params['search']['field'] == 'all'){
            //         $query->where(function($query) use($params){
            //             foreach($this->fieldSearchAccepted as $column){
            //                 $query->orWhere($column, 'like', "%{$params['search']['value']}%");
            //             } 
            //         });
            //     }else{
            //         $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
            //     }
            // }
            $result = $query->get()
                            ->toArray();   
        }
        return $result;
    }
    
}
