<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribeModel extends Model
{
    protected $table = 'subscribe';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function saveItem($params = null, $option = null){
        // Chuc nang add
        if($option['task'] == 'add-item'){
            $this->email = $params['email'];
            $this->save();
        }
    }

    public function getItem($params = null, $option = null){
        // Chuc nang add
        $result = '';
        if($option['task'] == 'get-email'){
            $result = self::select('email')->where('email', $params['email'])->first();
        }
        return $result;
    }

}
