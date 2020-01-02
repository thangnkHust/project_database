<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function listItems($params, $option){
        $result = null;

        if($option['task'] == 'admin-list-items-in-selectbox'){
            $query = $this->select('id', 'name');
            $result = $query->pluck('name', 'id')->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $option = null){
        $result = null;

        if($option['task'] == 'get-role_id-by-name'){
            $result = self::select('type')->where('name', 'LIKE', "%{$params['search']['value']}%")->first();
        }
        return $result;
    }
    
}
